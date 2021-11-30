<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class ChargeTest extends TestCase
{
    public function testCanPerformTokenizedCharges(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->withToken([
            'token' => 'abc',
            'email' => 'contact@starfolksoftware.com',
            'currency' => 'NGN',
            'country' => 'NG',
            'amount' => 100,
            'tx_ref' => '12345',
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanUpdateCustomerToken(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->updateCustomerToken(
            124343, [
                'email' => 'contact@starfolksoftware.com',
                'first_name' => 'Faruk',
                'last_name' => 'Nasir',
                'phone_number' => '09022334433'
            ]
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testCanPerformTokenizedChargesInBulk(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->withTokenInBulk([
            "title" => "Monthly payment to vendors",
            "retry_strategy" => [
                "retry_interval" => 120,
                "retry_amount_variable" => 60,
                "retry_attempt_variable" => 2
            ],
            "bulk_data" => [
                [
                    'token' => 'abc',
                    'email' => 'contact@starfolksoftware.com',
                    'currency' => 'NGN',
                    'country' => 'NG',
                    'amount' => 100,
                    'tx_ref' => '12345',
                ],
                [
                    'token' => 'adsdbc',
                    'email' => 'contact@starfolksoftware.com',
                    'currency' => 'NGN',
                    'country' => 'NG',
                    'amount' => 1000,
                    'tx_ref' => '123dds45',
                ],
            ]
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanGetBulkTokenizedChargesResponses(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->getBulkTokenizedChargesResponses(
            324234
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testCanGetBulkTokenizedChargesTransactions(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->getBulkTokenizedChargesTransactions(
            324234
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaCard(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaCard([
            "amount" => 100,
            "currency" => "NGN",
            "card_number" => 5399670123490229,
            "cvv" => 123,
            "expiry_month" => 1,
            "expiry_year" => 21,
            "email" => "user@flw.com",
            "tx_ref" => "MC-3243e",
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaBankTransfer(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaBankTransfer([
            "amount" => 100,
            "email" => "user@flw.com",
            "currency" => "NGN",
            "tx_ref" => "MC-MC-1585230ew9v5050e8",
            "fullname" => "Yemi Desola",
            "phone_number" => "07033002245",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                "flightID" => "123949494DC",
                "sideNote" => "This is a side note to track this call"
            ],
            "is_permanent" => false
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaAchPayment(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaAchPayment([
            "amount" => 100,
            "currency" => "ZAR",
            "email" => "ekene@flw.com",
            "tx_ref" => "MC-3243e",
            "fullname" => "Ekene Eze",
            "phone_number" => "07033002245",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                "flightID" => "123949494DC",
                "sideNote" => "This is a side note to track this call"
            ],
            "redirect_url" => "http://ekeneeze.com/u/payment-completed",
            "country" => "US"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaDebitUkAccount(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaDebitUkAccount([
            "account_bank" => "044",
            "account_number" => "0690000032",
            "amount" => 100,
            "email" => "user@flw.com",
            "tx_ref" => "MC-1585230ew9v5050e8",
            "currency" => "GBP",
            "fullname" => "Yemi Desola",
            "phone_number" => "07033002245",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                "flightID" => "123949494DC",
                "sideNote" => "This is a side note to track this call"
            ],
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaMobileMoneyGhana(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaMobileMoneyGhana([
            "amount" => 1500,
            "currency" => "GHS",
            "email" => "user@flw.com",
            "tx_ref" => "MC-3243e",
            "phone_number" => "054709929220",
            "network" => "MTN",
            "fullname" => "John Madakin",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                 "flightID" => "123949494DC",
                 "sideNote" => "This is a side note to track this call"
            ],
            "redirect_url" => "https://webhook.site/3ed41e38-2c79-4c79-b455-97398730866c"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaMobileMoneyRwanda(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaMobileMoneyRwanda([
            "amount" => 1500,
            "currency" => "RWF",
            "email" => "user@flw.com",
            "tx_ref" => "MC-3243e",
            "order_id" => "USS_URG_893982923s2323",
            "phone_number" => "054709929220",
            "fullname" => "John Madakin",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                 "flightID" => "123949494DC",
                 "sideNote" => "This is a side note to track this call"
            ],
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaMobileMoneyUganda(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaMobileMoneyUganda([
            "amount" => 1500,
            "currency" => "UGX",
            "email" => "user@flw.com",
            "tx_ref" => "MC-3243e",
            "order_id" => "USS_URG_893982923s2323",
            "fullname" => "John Madakin",
            "phone_number" => "054709929220",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                "flightID" => "123949494DC",
                "sideNote" => "This is a side note to track this call"
            ],
            "redirect_url" => "https://rave-webhook.herokuapp.com/receivepayment",
            "voucher" => 128373,
            "network" => "MTN"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaMobileMoneyZambia(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaMobileMoneyZambia([
            "amount" => 1500,
            "currency" => "ZMW",
            "email" => "user@flw.com",
            "tx_ref" => "MC-3243e",
            "network" => "MTN",
            "order_id" => "URF_MMGH_1585323540079_5981535",
            "fullname" => "John Madakin",
            "phone_number" => "054709929220",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                "flightID" => "123949494DC",
                "sideNote" => "This is a side note to track this call"
            ]
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaUssd(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaUssd([
            "account_bank" => "058",
            "amount" => 1500,
            "currency" => "NGN",
            "email" => "user@flw.com",
            "tx_ref" => "MC-3243e",
            "fullname" => "Yemi Desola",
            "phone_number" => "07033002245",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                "flightID" => "123949494DC",
                "sideNote" => "This is a side note to track this call"
            ]
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaMpesa(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaMpesa([
            "amount" => 1500,
            "currency" => "KES",
            "phone_number" => "25454709929220",
            "email" => "user@flw.com",
            "tx_ref" => "MC-15852113s09v5050e8",
            "fullname" => "John Madakin",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                "flightID" => "123949494DC",
                "sideNote" => "This is a side note to track this call"
            ]
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaVoucherPayment(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaVoucherPayment([
            "amount" => 100,
            "currency" => "ZAR",
            "email" => "user@flw.com",
            "tx_ref" => "MC-3243e",
            "pin" => "19203804939000",
            "fullname" => "John Madakin",
            "phone_number" => "0902620185",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                "flightID" => "123949494DC",
                "sideNote" => "This is a side note to track this call"
            ],
            "redirect_url" => "http://johnmadakin.com/u/payment-completed",
            "country" => "US"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaMobileMoneyFranco(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaMobileMoneyFranco([
            "amount" => 1500,
            "currency" => "XAF or XOF",
            "phone_number" => "237******20",
            "email" => "user@flw.com",
            "tx_ref" => "MC-15852113s09v5050e8",
            "country" => "CM",
            "fullname" => "John Madakin",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                "flightID" => "123949494DC",
                "sideNote" => "This is a side note to track this call"
            ]
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testCanBeChargedViaDebitNgAccount(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->viaDebitNgAccount([
            "account_bank" => "044",
            "account_number" => "0690000032",
            "amount" => 100,
            "email" => "user@flw.com",
            "tx_ref" => "MC-MC-1585230ew9v5050e8",
            "currency" => "NGN",
            "fullname" => "Yemi Desola",
            "phone_number" => "07033002245",
            "client_ip" => "154.123.220.1",
            "device_fingerprint" => "62wd23423rq324323qew1",
            "meta" => [
                "flightID" => "123949494DC",
                "sideNote" => "This is a side note to track this call"
            ],
            "passcode" => "07051993",
            "bvn" => "22181233643"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testPendingTransactionCanBeValidated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->charges->validate(
            "MC-15852113s09v5050e8",
            "dfsdfsdfs"
        );

        $this->assertEquals('success', $response['status']);
    }
}