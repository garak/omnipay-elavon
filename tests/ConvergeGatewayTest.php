<?php namespace Omnipay\Elavon;

use Omnipay\Tests\GatewayTestCase;

class ConvergeGatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new ConvergeGateway($this->getHttpClient(), $this->getHttpRequest());
        $this->options = array(
            'amount'    => 10.00,
            'card'      => $this->getValidCard(),
            'ssl_salestax' => 1.23,
            'ssl_invoice_number' => 1,
            'ssl_show_form' => 'false',
            'ssl_result_format' => 'ASCII',
            'merchantId' => 'testmerchant1',
            'username' => 'testusername1',
            'password' => 'testpassword1',
            'currency' => 'USD'
        );
    }

    public function testAuthorize()
    {
        $request = $this->gateway->authorize($this->options);
        $this->assertInstanceOf('Omnipay\Elavon\Message\ConvergeAuthorizeRequest', $request);
        $this->assertSame('10.00', (string) $request->getAmount());
        $this->assertSame('1.23', (string) $request->getSslSalesTax());
        $this->assertSame('1', (string) $request->getSslInvoiceNumber());
        $this->assertSame('false', (string) $request->getSslShowForm());
        $this->assertSame('ASCII', (string) $request->getSslResultFormat());
        $this->assertSame('testmerchant1', $request->getMerchantId());
        $this->assertSame('testusername1', $request->getUsername());
        $this->assertSame('testpassword1', $request->getPassword());
        $this->assertSame('testpassword1', $request->getPassword());
        $this->assertSame('USD', $request->getCurrency());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase($this->options);
        $this->assertInstanceOf('Omnipay\Elavon\Message\ConvergePurchaseRequest', $request);
        $this->assertSame('10.00', (string) $request->getAmount());
        $this->assertSame('1.23', (string) $request->getSslSalesTax());
        $this->assertSame('1', (string) $request->getSslInvoiceNumber());
        $this->assertSame('false', (string) $request->getSslShowForm());
        $this->assertSame('ASCII', (string) $request->getSslResultFormat());
        $this->assertSame('testmerchant1', $request->getMerchantId());
        $this->assertSame('testusername1', $request->getUsername());
        $this->assertSame('testpassword1', $request->getPassword());
        $this->assertSame('testpassword1', $request->getPassword());
        $this->assertSame('USD', $request->getCurrency());
    }
}
