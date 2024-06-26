<?php
return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

        // TODO: set defaults
        // TODO: handle insecure environment
        $data = [
            'all' => $kirby->request(),
            'name'  => get('name'), // default: Anonym
            'email' => get('email'), // default: noreply@upstream-newsletter.de
            'frage'  => get('frage'),
            'relevanz' => get('relevanz')
        ];

        // TODO: setup validation for input if set as required in panel
        $data = [
            'name'  => get('name') ?? "Anonym",
            'email' => get('email') ?? "",
            'frage'  => get('frage') ?? "",
            'relevanz' => get('relevanz') ?? ""
        ];

        $rules = [
            'name'  => ['minLength' => 1],
            'email' => ['email'],
            'frage'  => ['minLength' => 0, 'maxLength' => 3000],
            'relevanz'  => ['minLength' => 0, 'maxLength' => 3000],
        ];

        $messages = [
            'name'  => 'Please enter a valid name',
            'email' => 'Please enter a valid email address',
            'frage'  => 'Please enter a text between 3 and 3000 characters',
            'relevanz'  => 'Please enter a text between 3 and 3000 characters'
        ];

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;
        }

        try {
            $kirby->email([
                'template' => 'umfrage',
                'from'     => 'soeren.engels+test@googlemail.com',
                'replyTo'  => $data['email'],
                'to'       => 'soeren.engels@googlemail.com',
                'subject'  => /* esc($data['name']) .  */' hat auf deine Umfrage geantwortet',
                'data'     => [ // wird an /template/emails/umfrage.php weitergegeben
                    'text'   => esc($data['frage']),
                    'sender' => "test"/* esc($data['name']) */,
                    'data' => $data,
                    'poll_title' => $page->title(),
                ]
            ]);

        } catch (Exception $error) {
            if(option('debug')) {
                $alert['error'] = 'The form could not be sent: <strong>' . $error->getMessage() . '</strong>';
            } else {
                $alert['error'] = 'Es gab leider einen Fehler beim Versenden deiner Antwort. Bitte schreibe uns eine kurze Mail an mail@upstream-newsletter.de und informiere uns darüber.';
            }
        }

            // no exception occurred, let's send a success message
            if (empty($alert) === true) {
                $success = true;
                # $data = [];
            }
            $success = true;
    }

    return [
        'poll_items'   => $page->children()->listed(),
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false,
        'successPage' => $page->children()->findBy('template', 'umfrage-success') ?? $page->siblings()->findBy('template', 'umfrage-success')
    ];
};