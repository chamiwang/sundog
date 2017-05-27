<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/20
 * Time: 11:31
 */

namespace Core;

use Doctrine\ORM\Tools\Pagination\Paginator;

class QBPager
{
    protected $page = 1;
    protected $limit = 10;
    protected $offset = 1;
    public function pagination($qb, $data){
        if(isset($data['page'])) {
            $this->page = $data['page'];
        }
        if(isset($data['limit'])) {
            $this->limit = $data['limit'];
        }

        if($this->page >1) {
            $this->offset = ($this->page-1)*$this->limit+1;
        }

        if(isset($data['offset'])) {
            $this->offset = $data['offset'];
        }

        $result = $qb->setFirstResult( $this->offset )
           ->setMaxResults( $this->limit )->getQuery()->getResult();
/*var_dump($result);exit;
        $paginator = new Paginator($qb, $fetchJoinCollection = true);

        $c = count($paginator);*/
        return $result;
    }
}