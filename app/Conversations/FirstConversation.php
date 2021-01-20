<?php


namespace App\Conversations;


use App\Models\TelegramUsersData;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\Log;

class FirstConversation extends Conversation
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
            $user->update([
                'phone_number' => $answer->getText()
            ]);
            $name = $answer->getText();
            $this->say('Номер телефона: ' . $name);

            $this->askLocation();
        });
    }

    /**
     * Ask for location
     */
    public function askLocation()
    {
        $this->askForLocation('Пожалуйста отправьте свою локацию.', function (Location $location) {
//            $user = $this->getUserData();
//            Log::info(print_r($location, true));
            $this->say('Спасибо! Скоро мы свяжемся.');
        });
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
        if (!$db_user = TelegramUsersData::where('user_telegram_id', $user->getId())->first()) {
            return TelegramUsersData::create([
                'user_telegram_id' => $user->getId()
            ]);
        }else{
            return $db_user;
        }
    }

}
