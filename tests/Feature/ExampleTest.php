<?php

it('show navbar items', function () {
    $this->get('/')
    ->assertSeeText(['Log In','Register']);
});
