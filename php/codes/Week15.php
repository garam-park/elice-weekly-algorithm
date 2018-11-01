<?php

namespace Week15 {

    /**
     * 이동 시키는 함수
     * 
     * 인덱스를 1의 자리로 이동 시키는 데 최소로 이동하록하는 이동 경로
     *
     * @param integer $queue_size 큐의 크기
     * @param integer $index pop을 하는 자리(index:1)으로 이동하려고 하는 요소의 인덱스
     * @return integer 이동 거리
     */
    function move(int $queue_size,int $index) : int 
    {
        $r = 1 - $index;
        $l = ($queue_size + 1) - $index;
    
        $ret = abs($r)<$l?$r:$l;
    
        return $ret;
    }
    
    /**
     * $move 만큼 이동후에 target은 어떤 모양이어야 하나?
     *
     * @param integer $queue_size
     * @param array $targets
     * @param integer $move
     * @return void
     */
    function change(int $queue_size,&$targets,int $move)
    {
        foreach ($targets as $key => $index) {
            $index = $index+$move;
    
            if($index > $queue_size){
                $index = $index - $queue_size;
            }
    
            if($index <= 0)
                $index = $queue_size + $index;
    
            $targets[$key] = $index;
        }
    }
    
    /**
     * 솔루션
     *
     * @param int $queue_size 원형큐의 사이즈
     * @param int $oc (out count) 제거하려는 요소의 개수 
     * @param array $targets 제거하려는 요소의 배열
     * @return int answer
     */
    function solution(int $queue_size,int $oc,array $targets)
    {
        $count = 0;

        foreach (range(0,$oc-1) as $key) {
            //크기가 queue_size인 큐에서 targets[key]를 
            //pop을 하는 1의 자리로 이동 시킬때 가장 짧은 경로
            $move = move($queue_size,$targets[$key]);
            //이동 시킨 targets를 move 만큼 이동시킨 위치로 설정.
            change($queue_size--,$targets,$move);
            
            //하나를 pop 하면 -1(우측 이동)과 같은 결과다
            change($queue_size,$targets,-1);
            //이동의 절대 값을 저장한다
            $count+=abs($move);
        }

        return $count;
    }
    
}
