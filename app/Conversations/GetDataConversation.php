<?php


namespace App\Conversations;


use App\Models\ApplicationFromForm;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
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

            $message = 'Имя: ' . $this->getBot()->userStorage()->get('name') . PHP_EOL;
            $message .= 'Номер телефона: ' . $this->getBot()->userStorage()->get('phone_number') . PHP_EOL;
            $message .= 'Локация: ';

            $this->getBot()->sendRequest('sendMessage', [
                'chat_id' => '-1001379566831',
                'text' => $message
            ]);

            $this->getBot()->sendRequest( 'sendLocation', [
                'chat_id' => -1001379566831,
                'latitude' => $location->getLatitude(),
                'longitude' => $location->getLongitude()
            ]);

            $item = DB::table('andradedev_subscribe_subscribers')->latest()->first();

            DB::table('andradedev_subscribe_subscribers')->insert([
                'email' => 'from@telegram.com' . $item->id,
                'latitude' => $location->getLatitude(),
                'longitude' => $location->getLongitude(),
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
            $this->askFirstname();
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
