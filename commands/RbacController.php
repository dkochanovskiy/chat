<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        $readUser = $auth->createPermission('readUser');
        $readUser->description = 'Read user';
        $auth->add($readUser);

        $roleChange = $auth->createPermission('roleChange');
        $roleChange->description = 'Role change';
        $auth->add($roleChange);

        $markIncorrect = $auth->createPermission('markIncorrect');
        $markIncorrect->description = 'Mark as incorrect';
        $auth->add($markIncorrect);

        $markCorrect = $auth->createPermission('markCorrect');
        $markCorrect->description = 'Mark as correct';
        $auth->add($markCorrect);

        $readIncorrect = $auth->createPermission('readIncorrect');
        $readIncorrect->description = 'Read as incorrect';
        $auth->add($readIncorrect);

        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $createPost);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $readUser);
        $auth->addChild($admin, $roleChange);
        $auth->addChild($admin, $markIncorrect);
        $auth->addChild($admin, $markCorrect);
        $auth->addChild($admin, $readIncorrect);
        $auth->addChild($admin, $user);

        $auth->assign($user, 2);
        $auth->assign($admin, 1);
    }
}