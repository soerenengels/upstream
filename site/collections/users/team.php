<?php

return function ($users) {
    return $users->filterBy('role', 'in', ['editor', 'advisor']);
};
