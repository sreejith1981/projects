<?php
namespace Console;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;



class ListCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }



    public function configure()
    {
        $this -> setName('list')
            -> setDescription('Student list.')
            -> setHelp('This command allows you to get student list')
            -> addArgument('studentname', InputArgument::REQUIRED, 'The name of the student.');
    }



    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output -> writeln([
            '====**** Student Console App ****====',
            '==========================================',
            '',
        ]);

        $output -> writeln($input -> getArgument('studentname'));
    }
}
?>
