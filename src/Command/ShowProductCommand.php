<?php
namespace Demo\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

// use Hong\Entity\Product;

use Demo\Dao\ProductDao;
use Demo\Dao\FeatureDao;

class ShowProductCommand extends Command
{
    // public function __construct(
    //     private EntityManager $entityManager,
    // ){
    //     parent::__construct();
    // }

    protected function configure()
    {
        $this
            // defining the command name
            ->setName('show-product')
            // defining the description of the command 
            ->setDescription('show a product')
            // defining the help (shown with -h option)
            ->setHelp('This command shows a product');
        
        $this->addArgument('productid', InputArgument::REQUIRED, 'The product id.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $productid = $input->getArgument('productid');

        $dao = new ProductDao();
        $dao2 = new FeatureDao();
        $product = $dao->getProductByID($productid);
        $features = $dao2->getFeaturesByProductId($productid);

        if(!is_null($product)){
            echo sprintf("%s-%s\n", $product->getId(), $product->getName());
            foreach ($features as $feature) {
                echo sprintf("%s\n", $feature->getName());
            }
        } else {
            $output->writeln("there is no Product with ID $productid");
        }
        
        return Command::SUCCESS;
    }

}