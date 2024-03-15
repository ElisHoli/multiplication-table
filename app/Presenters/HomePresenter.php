<?php

declare(strict_types=1);

namespace App\Presenters;

use Exception;
use Nette;
use Nette\Application\UI\Form;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    private array $primes = [];
    private int $count = 10;

    public function renderDefault()
    {
        $this->template->count = $this->count;
        $this->template->primes = $this->primes;
    }

    public function createComponentNumberForm(): Form
    {
        $form = new Form();

        $form->addText('count', 'Počet prvočísel:')
            ->setRequired('Počet musí být vyplněný.')
            ->addRule($form::Integer, 'Zadejte prosím platné celé číslo.')
            ->addRule($form::Min, 'Číslo musí být alespoň 1.', 1);

        $form->addSubmit('submit', 'Generovat tabulku');

        $form->onSuccess[] = [$this, 'numberFormSucceeded'];

        return $form;
    }

    /**
     * @throws Exception
     */
    protected function numberFormSucceeded(Form $form, array $values): void
    {
        try {
            $this->primes = $this->generatePrimes($values['count']);
            $this->redrawControl('primesSnippet');
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            $this->flashMessage($errorMessage, 'danger');
            $this->redirect(':default');
        }
    }

    /**
     * @throws Exception
     */
    public function generatePrimes(int $count): array
    {
        $primes = [];
        $number = 2;
        $start = time();
        $timeout = 29;

        while (count($primes) < $count) {
            if (time() - $start > $timeout) {
                throw new Exception('Časový limit překročen, zkuste zadat menší číslo.');
            }

            if ($this->isPrime($number)) {
                $primes[] = $number;
            }
            $number++;
        }
        return $primes;
    }

    private function isPrime(int $number): bool
    {
        if ($number <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }
        return true;
    }
}
