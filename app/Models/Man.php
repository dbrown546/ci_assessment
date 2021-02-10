<?php

namespace App\Models;

class Man
{
    private $mouth = 'closed';

    private function openMouth() {
        $this->mouth = 'open';
    }

    private function closeMouth() {
        $this->mouth = 'closed';
    }

    public function requestOpenMouth($requester) {
        if ($requester == 'doctor') {
            $this->openMouth();
        }
    }

    public function requestCloseMouth($requester) {
        if ($requester == 'doctor') {
            $this->closeMouth();
        }
    }
}
