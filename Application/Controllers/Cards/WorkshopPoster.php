<?php

namespace Application\Controllers\Cards;

use Application\Main\AuthController;
use Application\Models\Feed;
use Application\Models\User;
use Application\Models\Workshop;
use System\Core\Model;
use System\Core\Request;
use System\core\Response;
use System\Responses\View;
use Application\Models\Language;

class WorkshopPoster extends AuthController
{
    public function generate(Request $request, Response $response)
    {
        $userId = $request->get('user_id');
        $workshopM = Model::get(Workshop::class);
        $workshop = $workshopM->getLatestOne($userId);
        $feedM = Model::get(Feed::class);
        $feed = $feedM->getFeedByRef("workshop_{$workshop['id']}");

        $workshopTimestamp = strtotime($workshop['date']);
        $lang = Model::get(Language::class);

        $userM = Model::get(User::class);
        $user = $userM->getUser($userId);


        $view = new View();
        $view->set('Cards/WorkshopPoster/index', [
            'user' => $user,
            'feedId' => $feed['id'],
            'workshop' => [
                'name' => $workshop['name'],
                'desc' => $workshop['desc'],
                'date' => date("d-m-Y", $workshopTimestamp),
                'day' => $lang(date("D", $workshopTimestamp)),
                'time' => date("h:iA", $workshopTimestamp),
            ],
        ]);

        $view->append('header');
        $view->append('footer');

        $response->set($view);
    }
}