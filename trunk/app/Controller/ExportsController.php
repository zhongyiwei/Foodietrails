<?php

App::uses('AppController', 'Controller');

class ExportsController extends AppController {

    public function index() {
        $tourDates = $this->TourDate->find('list', array('fields' => array('tour_date'), 'conditions' => array('TourDate.tour_date >=' => date('Y-m-d H:i:s'))));
        $tour = $this->Tour->find('list');
        $tourDatesPre = $this->TourDate->find('list', array('fields' => array('tour_date'), 'conditions' => array('TourDate.tour_date <' => date('Y-m-d H:i:s'))));
        $cookingClassDates = $this->CookingclassDate->find('list', array('fields' => array('cookingclass_date'), 'conditions' => array('CookingclassDate.cookingclass_date >=' => date('Y-m-d H:i:s'))));
        $cookingClassDatesPre = $this->CookingclassDate->find('list', array('fields' => array('cookingclass_date'), 'conditions' => array('CookingclassDate.cookingclass_date <' => date('Y-m-d H:i:s'))));
        $this->set(compact('tourDates', 'tour', 'tourDatesPre', 'cookingClassDates', 'cookingClassDatesPre'));
    }

    public function exportTour() {
        ini_set('max_execution_time', 6000);
        $tourDateId = $this->request->data['exports']['tour_date_id'];
        $tourDates = $this->TourDate->find('all', array('conditions' => array('TourDate.id' => $tourDateId)));
        $tourOrders = $this->TourOrder->find('all', array('conditions' => array('TourOrder.tour_date_id' => $tourDateId)));

        $header_row = array(
            'First Name',
            'Surname',
            'Contact Details (Phone)',
            'Email',
            'Dietary Requirements',
            'SPL Assistance',
        );
        if ($tourOrders != null) {
            $tourName = $tourOrders[0]['Tour']['tour_name'];
            $tourDate = $tourDates[0]['TourDate']['tour_date'];
            $filename = "Tour_Order_for $tourName On $tourDate.csv";
            $csv_file = fopen('php://output', 'w');
            $this->autoRender = false;

            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '"');

            $heading = array("$tourName On $tourDate");
            fputcsv($csv_file, $heading, ',', '"');
            fputcsv($csv_file, $header_row, ',', '"');
            foreach ($tourOrders as $result) {
                $row = array(
                    $result['User']['user_first_name'],
                    $result['User']['user_surname'],
                    $result['User']['user_contacts'],
                    $result['User']['user_email'],
                    $result['User']['user_dietary_requirement'],
                    $result['User']['user_spl_assistance'],
                );
                fputcsv($csv_file, $row, ',', '"');
            }
            fclose($csv_file);
        } else {
            $filename = "Tour_Order.csv";
            $csv_file = fopen('php://output', 'w');
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            fputcsv($csv_file, $header_row, ',', '"');
            $noData = array('There is no body booked this tour yet.');
            fputcsv($csv_file, $noData, ',', '"');
            fclose($csv_file);
        }
    }

    public function exportCookingClass() {
        ini_set('max_execution_time', 6000);
        $cookingClassDateId = $this->request->data['exports']['cookingclass_date_id'];
        $cookingClassDates = $this->CookingclassDate->find('all', array('conditions' => array('CookingclassDate.id' => $cookingClassDateId)));
        $cookingClassOrders = $this->CookingclassOrder->find('all', array('conditions' => array('CookingclassOrder.cooking_class_date_id' => $cookingClassDateId)));

        $this->autoRender = false;
        $header_row = array(
            'First Name',
            'Surname',
            'Contact Details (Phone)',
            'Email',
            'Dietary Requirements',
            'SPL Assistance',
        );

        if ($cookingClassOrders != null) {
            $cookingClassName = $cookingClassOrders[0]['Cookingclass']['cooking_class_name'];
            $cookingClassDate = $cookingClassDates[0]['CookingclassDate']['cookingclass_date'];

            $filename = "Cooking_Class_Order_for $cookingClassName On $cookingClassDate.csv";
            $csv_file = fopen('php://output', 'w');
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            $heading = array("$cookingClassName On $cookingClassDate");
            fputcsv($csv_file, $heading, ',', '"');

            fputcsv($csv_file, $header_row, ',', '"');
            foreach ($cookingClassOrders as $result) {
                $row = array(
                    $result['User']['user_first_name'],
                    $result['User']['user_surname'],
                    $result['User']['user_contacts'],
                    $result['User']['user_email'],
                    $result['User']['user_dietary_requirement'],
                    $result['User']['user_spl_assistance'],
                );
                fputcsv($csv_file, $row, ',', '"');
            }
            fclose($csv_file);
        } else {
            $filename = "Cooking_Class_Order.csv";
            $csv_file = fopen('php://output', 'w');
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            fputcsv($csv_file, $header_row, ',', '"');
            $noData = array('There is no body booked this cooking class yet.');
            fputcsv($csv_file, $noData, ',', '"');
            fclose($csv_file);
        }
    }

    public function exportProduct() {
        ini_set('max_execution_time', 6000);
        $beginDate = $this->request->data['exports']['beginDate'];
        $endDate = $this->request->data['exports']['endDate'];

        $beginDate = array_reverse($beginDate);
        $endDate = array_reverse($endDate);

        $beginDate = implode($beginDate, '-');
        $endDate = implode($endDate, '-');
        if ($beginDate < $endDate) {
            $productOrders = $this->ProductOrder->find('all', array('conditions' => array('product_purchase_date BETWEEN ? AND ?' => array($beginDate, $endDate))));

            $this->autoRender = false;
            $header_row = array(
                'Product Purchase Date',
                'Product Name',
                'Product Purchase Quantity',
                'Product Price',
                'First Name',
                'Surname',
                'Contact Details (Phone)',
                'Email',
                'Dietary Requirements',
                'SPL Assistance',
            );

            if ($productOrders != null) {
                $productName = $productOrders[0]['Product']['product_name'];

                $filename = "Product_Order_for $productName Between $beginDate and $endDate.csv";
                $csv_file = fopen('php://output', 'w');
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                $heading = array("Product_Order_for $productName Between $beginDate and $endDate");
                fputcsv($csv_file, $heading, ',', '"');

                fputcsv($csv_file, $header_row, ',', '"');
                foreach ($productOrders as $result) {
                    $row = array(
                        $result['ProductOrder']['product_purchase_date'],
                        $result['Product']['product_name'],
                        $result['ProductOrder']['product_purchase_quantity'],
                        $result['Product']['product_price'],
                        $result['User']['user_first_name'],
                        $result['User']['user_surname'],
                        $result['User']['user_contacts'],
                        $result['User']['user_email'],
                        $result['User']['user_dietary_requirement'],
                        $result['User']['user_spl_assistance'],
                    );
                    fputcsv($csv_file, $row, ',', '"');
                }
                fclose($csv_file);
            } else {
                $filename = "Product_Order.csv";
                $csv_file = fopen('php://output', 'w');
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                fputcsv($csv_file, $header_row, ',', '"');
                $noData = array('There is no body booked this cooking class yet.');
                fputcsv($csv_file, $noData, ',', '"');
                fclose($csv_file);
            }
        } else {
            $this->Session->setFlash(__('Invalid Date Period, Please check again'), 'failure-message');
            $this->redirect("index");
        }
    }

    public function exportGiftVoucher() {
        ini_set('max_execution_time', 6000);
        $beginDate = $this->request->data['exports']['beginDate'];
        $endDate = $this->request->data['exports']['endDate'];

        $beginDate = array_reverse($beginDate);
        $endDate = array_reverse($endDate);

        $beginDate = implode($beginDate, '-');
        $endDate = implode($endDate, '-');
        if ($beginDate < $endDate) {
            $giftVoucherOrder = $this->GiftvoucherOrder->find('all', array('conditions' => array('gift_purchase_date BETWEEN ? AND ?' => array($beginDate, $endDate))));

            $this->autoRender = false;
            $header_row = array(
                'Gift Voucher Purchase Date',
                'Gift Voucher Name',
                'Gift Voucher Price',
                'Gift Voucher Redeem Status',
                'First Name',
                'Surname',
                'Contact Details (Phone)',
                'Email',
                'Dietary Requirements',
                'SPL Assistance',
            );

            if ($giftVoucherOrder != null) {
                $giftVoucherName = $giftVoucherOrder[0]['GiftVoucher']['gift_voucher_name'];

                $filename = "Gift_Voucher_Order_for $giftVoucherName Between $beginDate and $endDate.csv";
                $csv_file = fopen('php://output', 'w');
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                $heading = array("Gift_Voucher_Order_for $giftVoucherName Between $beginDate and $endDate");
                fputcsv($csv_file, $heading, ',', '"');

                fputcsv($csv_file, $header_row, ',', '"');
                foreach ($giftVoucherOrder as $result) {
                    $row = array(
                        $result['GiftvoucherOrder']['gift_purchase_date'],
                        $result['GiftVoucher']['gift_voucher_name'],
                        $result['GiftVoucher']['gift_price'],
                        $result['GiftvoucherOrder']['gift_redeem_status'],
                        $result['User']['user_first_name'],
                        $result['User']['user_surname'],
                        $result['User']['user_contacts'],
                        $result['User']['user_email'],
                        $result['User']['user_dietary_requirement'],
                        $result['User']['user_spl_assistance'],
                    );
                    fputcsv($csv_file, $row, ',', '"');
                }
                fclose($csv_file);
            } else {
                $filename = "Product_Order.csv";
                $csv_file = fopen('php://output', 'w');
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                fputcsv($csv_file, $header_row, ',', '"');
                $noData = array('There is no body booked this cooking class yet.');
                fputcsv($csv_file, $noData, ',', '"');
                fclose($csv_file);
            }
        } else {
            $this->Session->setFlash(__('Invalid Date Period, Please check again'), 'failure-message');
            $this->redirect("index");
        }
    }

    public function exportTourPeriod() {
        ini_set('max_execution_time', 6000);
        $beginDate = $this->request->data['exports']['beginDate'];
        $endDate = $this->request->data['exports']['endDate'];

        $beginDate = array_reverse($beginDate);
        $endDate = array_reverse($endDate);

        $beginDate = implode($beginDate, '-');
        $endDate = implode($endDate, '-');
        if ($beginDate < $endDate) {
            $tourDates = $this->TourDate->find('all', array('conditions' => array('TourDate.tour_date BETWEEN ? AND ?' => array($beginDate, $endDate))));
            $tourOrders = null;
            for ($i = 0; $i < count($tourDates); $i++) {
                $tourOrders[$i] = $this->TourOrder->find('all', array('conditions' => array('TourOrder.tour_date_id' => $tourDates[$i]['TourDate']['id'])));
            }

            $header_row = array(
                'Tour Name',
                'Tour Holding Date',
                'Tour Price',
                'Tour Booked Quantity',
                'Tour Booked Date',
                'First Name',
                'Surname',
                'Contact Details (Phone)',
                'Email',
                'Dietary Requirements',
                'SPL Assistance',
            );
            if ($tourOrders != null) {
                $filename = "Tour_Order_between $beginDate and $endDate.csv";
                $csv_file = fopen('php://output', 'w');
                $this->autoRender = false;

                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '"');

                $heading = array("Tour_Order_between $beginDate and $endDate");
                fputcsv($csv_file, $heading, ',', '"');
                fputcsv($csv_file, $header_row, ',', '"');
                foreach ($tourOrders as $tourOrder) {
                    foreach ($tourOrder as $result) {
                        $row = array(
                            $result['Tour']['tour_name'],
                            $result['TourDate']['tour_date'],
                            $result['TourDate']['tour_price_per_certificate'],
                            $result['TourOrder']['tour_purchase_quantity'],
                            $result['TourOrder']['tour_purchase_date'],
                            $result['User']['user_first_name'],
                            $result['User']['user_surname'],
                            $result['User']['user_contacts'],
                            $result['User']['user_email'],
                            $result['User']['user_dietary_requirement'],
                            $result['User']['user_spl_assistance'],
                        );
                        fputcsv($csv_file, $row, ',', '"');
                    }
                }
                fclose($csv_file);
            } else {
                $filename = "Tour_Order.csv";
                $csv_file = fopen('php://output', 'w');
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                fputcsv($csv_file, $header_row, ',', '"');
                $noData = array('There is no body booked this tour yet.');
                fputcsv($csv_file, $noData, ',', '"');
                fclose($csv_file);
            }
        } else {
            $this->Session->setFlash(__('Invalid Date Period, Please check again'), 'failure-message');
            $this->redirect("index");
        }
    }

    public function exportCKPeriod() {
        ini_set('max_execution_time', 6000);
        $beginDate = $this->request->data['exports']['beginDate'];
        $endDate = $this->request->data['exports']['endDate'];

        $beginDate = array_reverse($beginDate);
        $endDate = array_reverse($endDate);

        $beginDate = implode($beginDate, '-');
        $endDate = implode($endDate, '-');
        if ($beginDate < $endDate) {
            $cookingClassDates = $this->CookingclassDate->find('all', array('conditions' => array('CookingClassDate.cookingclass_date BETWEEN ? AND ?' => array($beginDate, $endDate))));
            $cookingClassOrders = null;

            for ($i = 0; $i < count($cookingClassDates); $i++) {
                $cookingClassOrders[$i] = $this->CookingclassOrder->find('all', array('conditions' => array('CookingclassOrder.cooking_class_date_id' => $cookingClassDates[$i]['CookingclassDate']['id'])));
            }

            $this->autoRender = false;
            $header_row = array(
                'Cooking Class Name',
                'Cooking Class Holding Date',
                'Cooking Class Booked Quantity',
                'Cooking Class Booked Date',
                'First Name',
                'Surname',
                'Contact Details (Phone)',
                'Email',
                'Dietary Requirements',
                'SPL Assistance',
            );

            if ($cookingClassOrders != null) {
                $filename = "Cooking_Class_Order_between $beginDate and $endDate.csv";
                $csv_file = fopen('php://output', 'w');
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                $heading = array("Cooking_Class_Order_between $beginDate and $endDate");
                fputcsv($csv_file, $heading, ',', '"');

                fputcsv($csv_file, $header_row, ',', '"');
                foreach ($cookingClassOrders as $cookingClassOrder) {
                    foreach ($cookingClassOrder as $result) {
//                        print_r($result);
                        $row = array(
                            $result['CookingClass']['cooking_class_name'],
                            $result['CookingClassDate']['cookingclass_date'],
                            $result['CookingclassOrder']['cooking_class_order_quantity'],
                            $result['CookingclassOrder']['cooking_class_order_date'],
                            $result['User']['user_first_name'],
                            $result['User']['user_surname'],
                            $result['User']['user_contacts'],
                            $result['User']['user_email'],
                            $result['User']['user_dietary_requirement'],
                            $result['User']['user_spl_assistance'],
                        );
                        fputcsv($csv_file, $row, ',', '"');
                    }
                }
                fclose($csv_file);
            } else {
                $filename = "Cooking_Class_Order.csv";
                $csv_file = fopen('php://output', 'w');
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                fputcsv($csv_file, $header_row, ',', '"');
                $noData = array('There is no body booked this cooking class yet.');
                fputcsv($csv_file, $noData, ',', '"');
                fclose($csv_file);
            }
        } else {
            $this->Session->setFlash(__('Invalid Date Period, Please check again'), 'failure-message');
            $this->redirect("index");
        }
    }
}

?>
