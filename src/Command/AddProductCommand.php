<?php
namespace Demo\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Demo\Dao\ProductDao;
use Demo\Entity\Product;

class AddProductCommand extends Command
{
    protected function configure()
    {
        $this
            // defining the command name
            ->setName('add-product')
            // defining the description of the command 
            ->setDescription('create a new product')
            // defining the help (shown with -h option)
            ->setHelp('This command adds a new product');
        
        $this->addArgument('productname', InputArgument::REQUIRED, 'The name of product.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $new_product_id = 0;
        $productname = $input->getArgument('productname');
        
        try {
            $dao = new ProductDao();
            $new_product_id = $dao->insert(new Product($productname));

        }  catch(\Exception $e) {
            echo 'there is a error'; echo "\n";
            echo $e->getMessage(); echo "\n";
            //throw $e;
        }
        
        $output->writeln("new Product has ID $new_product_id");
        return Command::SUCCESS;
    }

}