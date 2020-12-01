<?php
echo '<h1>Hint - Open Closed Principle</h1>';


interface Management
{
    public function processProject();
}

class AnotherProgrammer implements Management
{
    public function code()
    {
        return 'coding';
    }

    public function processProject()
    {
        echo '<br>' . $this->code();
        
    }
}

class Tester implements Management
{
    public function test()
    {
        return 'testing';
    }

    public function processProject()
    {
        echo '<br>' . $this->test();
    }
}

class Designer implements Management
{
    public function draw()
    {
        return 'drawing';
    }

    public function processProject()
    {
        echo '<br>' . $this->draw();
    }
}

class ProjectManagement
{
    public function process($member)
    {
        if ($member instanceof AnotherProgrammer or $member instanceof Tester) {
            
            $member->processProject();
            
        } else {
            throw new Exception('Invalid input member');
        }
        
    }
}



try {
    $anotherprogrammer = new AnotherProgrammer();
    $tester = new Tester();
    $designer = new Designer();
    $projectmanagement = new ProjectManagement();
    $qqq = $projectmanagement->process($anotherprogrammer);
    $www = $projectmanagement->process($tester);
    $eee = $projectmanagement->process($designer);
} catch (Exception $e) {
      echo '<p><b>' . $e->getMessage() . '</p></b>';
}