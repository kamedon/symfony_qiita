<?php
namespace KamedonQiitaBundle\Tests\Unit\APi;

use Doctrine\Common\Cache\Cache;
use KamedonQiitaBundle\Api\Qiita\QiitaApi;
use Phake;

/**
 * Created by IntelliJ IDEA.
 * User: kamedon
 * Date: 15/01/12
 * Time: 2:09
 */
class QiitaApiTest extends \PHPUnit_Framework_TestCase
{
    /** @var  QiitaApi */
    private $qiitaApi;

    protected function setUp()
    {
        parent::setUp();
        $this->qiitaApi = new QiitaApi("c1a8ba8b8e2c3f1f36d0b6d620fb8ab977aa9668");
    }

    /**
     * @test
     */
    public function QiitaへApiをリクエスト()
    {
        $page = 1;
        $perCount = 100;
        $res = json_decode($this->qiitaApi->requestToQiita("https://qiita.com/api/v2/tags?page=" . $page . "&per_page=" . $perCount));
        $this->assertSame(count($res), $perCount, "リクエストしたページ数が違います");
    }

    /**
     * @test
     */
    public function Qiitaへキャッシュへリクエスト()
    {
        $page = 1;
        $perCount = 100;
        /** @var Cache $cache */
        $cache = Phake::mock('Doctrine\Common\Cache\Cache');//, Phake::ifUnstubbed()->thenReturn(42));
        $this->qiitaApi->setCacheProvider($cache);
        $this->qiitaApi->requestToCache("https://qiita.com/api/v2/tags?page=" . $page . "&per_page=" . $perCount);
        $res = json_decode($this->qiitaApi->requestToQiita("https://qiita.com/api/v2/tags?page=" . $page . "&per_page=" . $perCount));
        $this->assertSame(count($res), $perCount, "リクエストしたページ数が違います");
    }

}