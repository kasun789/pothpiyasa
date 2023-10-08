<?php

use Dompdf\Dompdf;
use Dompdf\Options;

require_once __DIR__ . '/../models/dompdf/autoload.php';


class Make_pdf extends controller
{

    public function index()
    {

    }

    public function damage_report($jsonString)
    {


        $rows = json_decode(urldecode($jsonString));

        if ($rows) {
            $options = new Options();
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $templateString = null;

            extract($rows);

            require(__DIR__ . '/../views/admin/reports/templates/damage.report.template.view.php');


            //echo $templateString;

            $dompdf->setPaper('A4', 'landscape');

            $dompdf->loadHtml($templateString);

            //Generate the pdf document in memory
            $dompdf->render();

            //That send to the browser
            //We can change downloading document name by passing first argument to the stream method
            //Using second argument we can display the pdf in the browser before downloading
            $dompdf->stream("Damaged_books.pdf", ["Attachment" => 0]);
        } else {
            $this->redirect('Reports/damaged_books');
        }

    }

    public function donor_report($jsonString)
    {


        $rows = json_decode(urldecode($jsonString));

        if ($rows) {
            $options = new Options();
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $templateString = null;

            extract($rows);

            require(__DIR__ . '/../views/admin/reports/templates/donors.report.template.view.php');


            //echo $templateString;

            $dompdf->setPaper('A4', 'potrait');

            $dompdf->loadHtml($templateString);

            //Generate the pdf document in memory
            $dompdf->render();

            //That send to the browser
            //We can change downloading document name by passing first argument to the stream method
            //Using second argument we can display the pdf in the browser before downloading
            $dompdf->stream("Donor_details.pdf", ["Attachment" => 0]);
        } else {
            $this->redirect('Reports/donors');
        }

    }

    public function fine_report($jsonString)
    {


        $rows = json_decode(urldecode($jsonString));

        if ($rows) {
            $options = new Options();
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $templateString = null;

            extract($rows);

            require(__DIR__ . '/../views/admin/reports/templates/fine.report.template.view.php');


            //echo $templateString;

            $dompdf->setPaper('A4', 'landscape');

            $dompdf->loadHtml($templateString);

            //Generate the pdf document in memory
            $dompdf->render();

            //That send to the browser
            //We can change downloading document name by passing first argument to the stream method
            //Using second argument we can display the pdf in the browser before downloading
            $dompdf->stream("Fine_details.pdf", ["Attachment" => 0]);
        } else {
            $this->redirect('Reports/fine_report');
        }

    }

    public function fine_payment_report($jsonString)
    {


        $rows = json_decode(urldecode($jsonString));

        if ($rows) {
            $options = new Options();
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $templateString = null;

            extract($rows);

            require(__DIR__ . '/../views/admin/reports/templates/finepayment.report.template.view.php');


            //echo $templateString;

            $dompdf->setPaper('A4', 'landscape');

            $dompdf->loadHtml($templateString);

            //Generate the pdf document in memory
            $dompdf->render();

            //That send to the browser
            //We can change downloading document name by passing first argument to the stream method
            //Using second argument we can display the pdf in the browser before downloading
            $dompdf->stream("Fine_Payment_details.pdf", ["Attachment" => 0]);
        } else {
            $this->redirect('Reports/fine_payment');
        }


    }

    public function inventory_report($jsonString)
    {


        $rows = json_decode(urldecode($jsonString));

        if ($rows) {
            $options = new Options();
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $templateString = null;

            extract($rows);

            require(__DIR__ . '/../views/admin/reports/templates/inventory.report.template.view.php');


            //echo $templateString;

            $dompdf->setPaper('A4', 'potrait');

            $dompdf->loadHtml($templateString);

            //Generate the pdf document in memory
            $dompdf->render();

            //That send to the browser
            //We can change downloading document name by passing first argument to the stream method
            //Using second argument we can display the pdf in the browser before downloading
            $dompdf->stream("Inventory_details.pdf", ["Attachment" => 0]);

        } else {
            $this->redirect('Reports/inventory_report');
        }
    }

    public function issued_report($jsonString)
    {


        $rows = json_decode(urldecode($jsonString));

        if ($rows) {
            $options = new Options();
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $templateString = null;

            extract($rows);

            require(__DIR__ . '/../views/admin/reports/templates/issued.report.template.view.php');


            //echo $templateString;

            $dompdf->setPaper('A4', 'landscape');

            $dompdf->loadHtml($templateString);

            //Generate the pdf document in memory
            $dompdf->render();

            //That send to the browser
            //We can change downloading document name by passing first argument to the stream method
            //Using second argument we can display the pdf in the browser before downloading
            $dompdf->stream("Issued_book_details.pdf", ["Attachment" => 0]);
        } else {
            $this->redirect('Reports/issued_books');
        }

    }

    public function lost_report($jsonString)
    {


        $rows = json_decode(urldecode($jsonString));

        if ($rows) {

            $options = new Options();
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $templateString = null;

            extract($rows);

            require(__DIR__ . '/../views/admin/reports/templates/lost.report.template.view.php');


            //echo $templateString;

            $dompdf->setPaper('A4', 'landscape');

            $dompdf->loadHtml($templateString);

            //Generate the pdf document in memory
            $dompdf->render();

            //That send to the browser
            //We can change downloading document name by passing first argument to the stream method
            //Using second argument we can display the pdf in the browser before downloading
            $dompdf->stream("Donor_details.pdf", ["Attachment" => 0]);
        } else {
            $this->redirect('Reports/lost_books');
        }

    }

    public function returned_report($jsonString)
    {


        $rows = json_decode(urldecode($jsonString));

        if ($rows) {
            $options = new Options();
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $templateString = null;

            extract($rows);

            require(__DIR__ . '/../views/admin/reports/templates/returned.report.template.view.php');


            //echo $templateString;

            $dompdf->setPaper('A4', 'landscape');

            $dompdf->loadHtml($templateString);

            //Generate the pdf document in memory
            $dompdf->render();

            //That send to the browser
            //We can change downloading document name by passing first argument to the stream method
            //Using second argument we can display the pdf in the browser before downloading
            $dompdf->stream("Returned_book_details.pdf", ["Attachment" => 0]);

        } else {
            $this->redirect('Reports/returned_books');
        }
    }

    public function vendor_report($jsonString)
    {


        $rows = json_decode(urldecode($jsonString));

        if ($rows) {

            $options = new Options();
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $templateString = null;

            extract($rows);

            require(__DIR__ . '/../views/admin/reports/templates/vendors.report.template.view.php');


            //echo $templateString;

            $dompdf->setPaper('A4', 'potrait');

            $dompdf->loadHtml($templateString);

            //Generate the pdf document in memory
            $dompdf->render();

            //That send to the browser
            //We can change downloading document name by passing first argument to the stream method
            //Using second argument we can display the pdf in the browser before downloading
            $dompdf->stream("Vendor_details.pdf", ["Attachment" => 0]);
        } else {
            $this->redirect('Reports/vendors');
        }

    }

    public function withdrawn_report($jsonString)
    {


        $rows = json_decode(urldecode($jsonString));

        if ($rows) {
            $options = new Options();
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            $templateString = null;

            extract($rows);

            require(__DIR__ . '/../views/admin/reports/templates/withdrawn.report.template.view.php');


            //echo $templateString;

            $dompdf->setPaper('A4', 'potrait');

            $dompdf->loadHtml($templateString);

            //Generate the pdf document in memory
            $dompdf->render();

            //That send to the browser
            //We can change downloading document name by passing first argument to the stream method
            //Using second argument we can display the pdf in the browser before downloading
            $dompdf->stream("Withdrawn_details.pdf", ["Attachment" => 0]);

        } else {
            $this->redirect('Reports/withdrawn_books');
        }

    }


}