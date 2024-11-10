<?php
namespace Demo\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Demo\Dao\UserDao;
use Demo\Entity\User;

class AddUserCommand extends Command
{
    // public function __construct(
    //     private UserDao $userdao,
    // ){
    //     parent::__construct();
    // }

    protected function configure()
    {
        $this
            // defining the command name
            ->setName('add-user')
            // defining the description of the command 
            ->setDescription('create a new user')
            // defining the help (shown with -h option)
            ->setHelp('This command adds a new user');
        
        $this->addArgument('username', InputArgument::REQUIRED, 'The name of user.');
        $this->addArgument('email', InputArgument::REQUIRED, 'The email of user.');
        $this->addArgument('password', InputArgument::REQUIRED, 'The password of user.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $new_user_id = 0;
        $username = $input->getArgument('username');
        $email    = $input->getArgument('email');
        $password = $input->getArgument('password');

        try {
            $dao = new UserDao();
            $new_user_id = $dao->insert(new User($username, $email, $password));
        }  catch(\Exception $e) {
            echo 'there is a error'; echo "\n";
            echo $e->getMessage(); echo "\n";
            //throw $e;
        }
        
        $output->writeln("new User has ID $new_user_id");
        return Command::SUCCESS;
    }

}