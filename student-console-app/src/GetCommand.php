<?php

namespace Console;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;



// #######################################
// Name: GetCommand
// Created by: Sreejith <sreejith@vinamsolutions.com>
// Created date: 19-07-2018
// Description: Command class for list student details
class GetCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }



    public function configure()
    {
        $this
            -> setName('app:get-student')
            -> setDescription('Get student list.')
            -> setHelp('This command allows you to get student details...')
            -> addArgument('studentname', InputArgument::REQUIRED, 'The name of the student.')
        ;
    }



    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output -> writeln([
            '====**** Student Register Console App ****====',
            '==========================================',
            '',
        ]);

        $output -> writeln($input -> getArgument('studentname'));
    }
}

?>
