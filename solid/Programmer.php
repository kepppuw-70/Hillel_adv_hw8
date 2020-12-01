<?php
echo '<h1>Hint - Interface Segregation Principle</h1>';
//
interface WorkableCanCode
{
    public function canCode();
}

interface WorkableCode
{
    public function code();
}

interface WorkableTest
{
    public function test();
}

class Programmer implements WorkableCanCode, WorkableCode
{
    public function canCode()
    {
        return true;
    }
    public function code()
    {
        return 'coding';
    }
 }

class Tester implements WorkableCanCode, WorkableTest
{
    public function canCode()
    {
        return false;
    }
    
    public function test()
    {
        return 'testing';
    }
}

class ProjectManagement
{
    public function processCode(WorkableCanCode $member)
    {
        if ($member->canCode()) {
           echo '<br>' . $member->code();
        } else {
           echo '<br>' . $member->test();
        }
    }
}

$programmer = new Programmer();
$tester = new Tester();
$projectmanagement = new ProjectManagement();
$projectmanagement->processCode($programmer);
$projectmanagement->processCode($tester);



