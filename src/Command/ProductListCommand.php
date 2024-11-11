<?php
namespace Demo\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Demo\Dao\ProductDao;

class ProductListCommand extends Command
{
    protected function configure()
    {
        $this
            // defining the command name
            ->setName('show-product-list')
            // defining the description of the command 
            ->setDescription('show all products')
            // defining the help (shown with -h option)
            ->setHelp('This command shows all products');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $dao = new ProductDao();
            $products = $dao->getProducts();

            foreach ($products as $product) {
                echo sprintf("%s-%s\n", $product->getId(), $product->getName());
            }
        }  catch(\Exception $e) {
            echo 'there is a error'; echo "\n";
            echo $e->getMessage(); echo "\n";
        } 

        return Command::SUCCESS;
    }

}