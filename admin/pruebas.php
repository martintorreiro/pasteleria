<?php

function recortaTxt($txt,$lon) {
   
        if(strlen($txt)>$lon){
            
            $textoRecortado = substr($txt,0,$lon);
            $textoRecortado .= "...";
            return $textoRecortado;
        }
    };

    $res = recortaTxt('When she was already very successful, she never stopped understanding business and how it really works. Profit is the number one goal in business and how you make it is a natural talent. Yes, there may be a lot of guidelines given and showed on television and the internet but only you know how you will make your sales to the top. Try to ponder on these notes when thinking of a business: 1.) Passion. Business may be set on profit but the core of your business should be something you love. Passion counts a lot in businesses because it also builds your determination in achieving your goal. 2.) Impact. Business is a big and competitive world, what will matter is how you make a difference to your market. How your business will impact your market. The profit of your business will rely on the impact of your business. The mark it will leave to your customers will make it grow. Thousands of people dream of having their own business and even more so be a successful entrepreneur. But what does it take to achieve success in the business industry? One of the most successful entrepreneurs featured at the Forbes website, Wendy Lipton - Dibner said that "the success of your business would solely depend on you. The only thing you can rely on is your power to achieve your goal" She shared her success story at the Forbes website and said that when she was young she learned a very important business objective from her high school activity and that is to go out, explore, come back and explain how money is made in business. This is an objective she never forgot until she made millions for herself.',145);

    echo $res;
    
   

    ?>