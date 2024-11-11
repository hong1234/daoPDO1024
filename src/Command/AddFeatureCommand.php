<?php
namespace Demo\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Demo\Dao\ProductDao;
// use Demo\Entity\Product;
use Demo\Dao\FeatureDao;
use Demo\Entity\Feature;

class AddFeatureCommand extends Command
{
    protected function configure()
    {
        $this
            // defining the command name
            ->setName('add-feature')
            // defining the description of the command 
            ->setDescription('add a feature to product')
            // defining the help (shown with -h option)
            ->setHelp('This command adds a feature');
        
        $this->addArgument('productid', InputArgument::REQUIRED, 'The productId.');
        $this->addArgument('feature', InputArgument::REQUIRED, 'The name of feature.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $new_feature_id = 0;
        $productid = $input->getArgument('productid');
        $feature   = $input->getArgument('feature');

        $dao  = new ProductDao();
        $dao2 = new FeatureDao();
        try {

            $product = $dao->getProductByID($productid);
            if(!is_null($product)){
                $new_feature_id = $dao2->insert(new Feature($feature, $productid));
                $output->writeln("the new Feature has ID $new_feature_id");
            } else {
                $output->writeln("there is no Product with ID $productid");
            }

        }  catch(\Exception $e) {
            echo 'there is a error'; echo "\n";
            echo $e->getMessage(); echo "\n";
            //throw $e;
        }

        return Command::SUCCESS;
    }

}