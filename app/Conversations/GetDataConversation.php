<?php


namespace App\Conversations;


use App\Models\ApplicationFromForm;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\DB;

class GetDataConversation extends Conversation
{
    /**
     * Run conversation
     *
     * @return mixed|void
     */
    public function run()
    {
        $this->askFirstname();
    }

    /**
     * Ask for name
     */
    public function askFirstname()
    {
        $this->ask('Привет! Как Ваше имя?', function(Answer $answer) {

            $this->getBot()->userStorage()->save([
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

            try {
                $contact = $answer->getMessage()->getContact()->getPhoneNumber();
                $this->getBot()->userStorage()->save([
                    'phone_number' => $contact
                ]);
            }catch (\Exception $e){
                $contact = $answer->getMessage()->getText();
                $this->getBot()->userStorage()->save([
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
            $this->getBot()->userStorage()->save([
                'longitude' => $location->getLongitude(),
                'latitude' => $location->getLatitude(),
            ]);

            DB::table('andradedev_subscribe_subscribers')->insert([
                'email' => 'from@telegram.com',
                'latitude' => $this->getBot()->userStorage()->get('latitude'),
                'longitude' => $this->getBot()->userStorage()->get('longitude'),
                'status' => 1,
                'name' => $this->getBot()->userStorage()->get('name'),
                'surname' => $this->getBot()->userStorage()->get('phone_number'),
                'created_at' => now(),
                'updated_at' => now(),
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
}
