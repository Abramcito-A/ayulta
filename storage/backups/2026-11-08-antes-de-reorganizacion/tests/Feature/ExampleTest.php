<?php

test('the root redirects to the login experience', function () {
    $this->get('/')->assertRedirectToRoute('login');
});
