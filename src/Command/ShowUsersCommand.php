<?php
namespace Demo\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
// use Symfony\Component\Console\Input\InputArgument;

// use Demo\Entity\Student;
// use Demo\Entity\Banker;
use Demo\Dao\UserDao;
use Demo\Service\Printer;

class ShowUsersCommand extends Command
{
    // the name of the command (the part after "bin/console")
    // php bin/console app:show-list
    // protected static $defaultName = 'app:show-list';

    // private $pr;

    // public function __construct()
    // {
    //     parent::__construct();
    // }

    protected function configure()
    {
        $this
            ->setName('user-list')  // the command name
            ->setDescription('user list')  // the description of the command
            ->setHelp('This command list users')  // defining the help (shown with -h option)
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // ... put here the code to run in your command

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))

        $dao = new UserDao();
        $users = $dao->getUsers();
        $pr = new Printer($users);
        // $this->pr->add(new Student('Anna4', 33, 'anna@yahoo.de', 'Uni Muen'));
	    // $this->pr->add(new Banker('Bill4', 44, 'bill@yahoo.de', 'SSK Muenchen'));

        $pr->printAllOnConsole();
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;
    }
}
