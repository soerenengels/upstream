<?php

return function ($users) {
    return $users->filterBy('role', 'advisor');
};