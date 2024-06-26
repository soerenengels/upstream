<?php
use Kirby\Cms\Page;
use Kirby\Cms\Pages;

class RedaktionPage extends Page {
    public function children(): Pages {
        $usersPages = [];
        $users      = kirby()->users()->filterBy('role', 'in', ['editor', 'editor-inactive', 'advisory-board']);
        foreach ($users as $user) {
            $userPages[] = [
                'slug'     => Str::slug($user->name()),
                'num'      => $user->indexOf($users),
                'template' => 'author',
                'model' => 'author',
                'parent'   => 'redaktion',
                'content'  => [
                    'title'    => $user->name(),
                    'text'      => $user->authorPageText()->isNotEmpty() ? $user->authorPageText() : $user->bio(),
                    'userid'    => $user->id()
                ]
            ];
        }
        return Pages::factory($userPages, $this);
    }
}
