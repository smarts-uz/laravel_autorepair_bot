<?php


namespace App\Conversations;


use App\Models\ApplicationFromForm;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class GetDataConversation extends Conversation
{
    /**
     * Run conversation
     *
     * @return mixed|void
     */
    public function run()
    {
        $user = $this->getUserData();
        $this->askFirstname();
    }

    /**
     * Ask for name
     */
    public function askFirstname()
    {
        $this->ask('Привет! Как Ваше имя?', function(Answer $answer) {

            $user = $this->getUserData();
            $user->update([
                'name' => $answer->getText()
            ]);
            $name = $answer->getText();
            $this->say('Приятно познакомиться ' . $name);
            $this->askPhoneNumber();

        });
    }

    /**
     * Ask for phone number
     */
    public function askPhoneNumber()
    {
        $this->ask('Ваш номер телефона', function (Answer $answer) {

            $user = $this->getUserData();
            try {
                $contact = $answer->getMessage()->getContact()->getPhoneNumber();
                $user->update([
                    'phone_number' => $contact
                ]);
            }catch (\Exception $e){
                $contact = $answer->getMessage()->getText();
                $user->update([
                    'phone_number' => $contact
                ]);
            }

            $this->askLocation();
        }, [
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => 'Отправить контакт', 'request_contact' => true]
                    ]
                ],
                'one_time_keyboard' => true,
                'resize_keyboard' => true
            ])
        ]);
    }

    /**
     * Ask for location
     */
    public function askLocation()
    {
        $this->askForLocation('Пожалуйста отправьте свою локацию.', function (Location $location) {
            $user = $this->getUserData();
            $user->update([
                'longitude' => $location->getLongitude(),
                'latitude' => $location->getLatitude(),
                'updated_at' => now()
            ]);
            $this->say('Спасибо! Скоро мы свяжемся.');
            $this->say('Нажмите /start для того чтобы начать заного.');
            return true;
        }, function () {
            $this->say('Извините, вы не отправили локацию.');
            $this->askLocation();
        }, [
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => 'Отправить локацию', 'request_location' => true]
                    ]
                ],
                'one_time_keyboard' => true,
                'resize_keyboard' => true
            ])
        ]);
    }

    /**
     * Get telegram user data
     *
     * @return mixed
     */
    public function getUserData()
    {
        // Get bot user
        $user = $this->getBot()->getUser();
        // Check is the user exists in database
        // If exists create new user
        // else return user
        if (!$db_user = ApplicationFromForm::where('user_telegram_id', $user->getId())->first()) {
            return ApplicationFromForm::create([
                'user_telegram_id' => $user->getId(),
                'type' => 'telegram'
            ]);
        }else{
            return $db_user;
        }
    }

}
