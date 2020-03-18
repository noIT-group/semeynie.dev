<?php
namespace noIT\calltracker\rules;

use noIT\calltracker\RuleInterface;

class Googleads implements RuleInterface
{
    public function run()
    {
        return false;
    }
}