<?php

test('the root sends guests to the login experience through the home screen', function () {
    $this->get('/')->assertRedirect('/inicio');
    $this->get('/inicio')->assertRedirectToRoute('login');
});
