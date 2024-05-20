<x-masterAdmin title="Statistiques">
<body>
   
    <h1 class="sub-title">
         Statist<span>iques </span>
    </h1>

    <section>
        <div class="container1" id="skills">
            <h1 class="heading">Nombre des stages :</h1>
            <div class="Technical-bars">
                <div class="bar"><i style="color: #c95d2e" class='bx bxl-html5'></i>
                    <div class="indfo">
                       <span class="dep">Projet fin d'étude :</span>
                    </div>
                    <br>
                    <div class="progress-line html">
                      <span></span>
                    </div>
                </div>
                <div class="bar"><i style="color: #147bbc" class='bx bxl-css3'></i>
                    <div class="indfo">
                       <span class="dep">Immersion :</span>
                    </div>
                    <br>
                    <div class="progress-line css">
                      <span></span>
                    </div>
                </div>
                <div class="bar"><i style="color: #b0bc1e" class='bx bxl-javascript'></i>
                    <div class="indfo">
                      <span class="dep">En cours :</span>
                    </div>
                    <br>
                    <div class="progress-line javascript">
                      <span></span>
                    </div>
                </div>
                <div class="bar"><i style="color: #c32ec9" class='bx bxl-python'></i>
                    <div class="indfo">
                        <span class="dep">Terminé :</span>
                    </div>
                    <br>
                    <div class="progress-line python">
                        <span></span>
                    </div>
                </div>
                <div class="bar"><i style="color: #c32ec9" class='bx bxl-python'></i>
                    <div class="indfo">
                        <span class="dep">Licence :</span>
                    </div>
                    <br>
                    <div class="progress-line react">
                        <span></span>
                        
                    </div>
                </div>
                <div class="bar"><i style="color: #c32ec9" class='bx bxl-python'></i>
                    <div class="indfo">
                        <span class="dep">Master :</span>
                    </div>
                    <br>
                    <div class="progress-line php">
                        <span></span>
                        
                    </div>
                </div>
                <div class="bar"><i style="color: #c32ec9" class='bx bxl-python'></i>
                    <div class="indfo">
                        <span class="dep">Doctorat :</span>
                    </div>
                    <br>
                    <div class="progress-line blade">
                        <span></span>
                        
                    </div>
                </div>
                <div class="bar"><i style="color: #c32ec9" class='bx bxl-python'></i>
                    <div class="indfo">
                        <span class="dep">Ingénieur :</span>
                    </div>
                    <br>
                    <div class="progress-line js">
                        <span></span>
                        
                    </div>
                </div>
                <div class="bar"><i style="color: #c32ec9" class='bx bxl-python'></i>
                    <div class="indfo">
                        <span class="dep">Technicien Supérieur :</span>
                    </div>
                    <br>
                    <div class="progress-line java">
                        <span></span>
                        
                    </div>
                </div>
            </div>
        </div>


        <div class="container1">
            <h1 class="heading1">Pourcentage des stages :</h1>
            <div class="radial-bars">

                <div class="radial-bar">
                    <svg x="0px" y="0px" viewBox="0 0 200 200">
                       <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                       <circle class="path path-1" cx="100" cy="100" r="80"></circle>
                    </svg>
                    <div class="percentage" style="color:#fff">{{$pourcentage_pfe[0]}}%</div>
                    <div class="text">Projet fin d'étude :</div>
                </div>
                <div class="radial-bar">
                    <svg x="0px" y="0px" viewBox="0 0 200 200">
                       <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                       <circle class="path path-2" cx="100" cy="100" r="80"></circle>
                    </svg>
                    <div class="text">Immersion :</div>
                    <div class="percentage" style="color:#fff">{{$pourcentage_im[0]}}%</div>
                   
                </div>
                
                <div class="radial-bar">
                    <svg x="0px" y="0px" viewBox="0 0 200 200">
                       <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                       <circle class="path path-3" cx="100" cy="100" r="80"></circle>
                    </svg>
                    <div class="percentage" style="color:#fff">{{$pourcentage_en[0]}}%</div>
                    <div class="text" >En cours :</div>
                    
                </div>
            
                <div class="radial-bar">
                    <svg x="0px" y="0px" viewBox="0 0 200 200">
                       <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                       <circle class="path path-4" cx="100" cy="100" r="80"></circle>
                    </svg>
                    <div class="percentage" style="color:#fff">{{$pourcentage_te[0]}}%</div>
                    <div class="text">Terminé :</div>
                </div>

                <div class="radial-bar">
                    <svg x="0px" y="0px" viewBox="0 0 200 200">
                       <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                       <circle class="path path-5" cx="100" cy="100" r="80"></circle>
                    </svg>
                    <div class="percentage" style="color:#fff">{{$pourcentage_li[0]}}%</div>
                    <div class="text">Licence :</div>
                </div>

                <div class="radial-bar">
                    <svg x="0px" y="0px" viewBox="0 0 200 200">
                       <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                       <circle class="path path-6" cx="100" cy="100" r="80"></circle>
                    </svg>
                    <div class="percentage" style="color:#fff">{{$pourcentage_ma[0]}}%</div>
                    <div class="text">Master :</div>
                </div>

                <div class="radial-bar">
                    <svg x="0px" y="0px" viewBox="0 0 200 200">
                       <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                       <circle class="path path-7" cx="100" cy="100" r="80"></circle>
                    </svg>
                    <div class="percentage" style="color:#fff">{{$pourcentage_do[0]}}%</div>
                    <div class="text">Doctorat :</div>
                </div>

                <div class="radial-bar">
                    <svg x="0px" y="0px" viewBox="0 0 200 200">
                       <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                       <circle class="path path-8" cx="100" cy="100" r="80"></circle>
                    </svg>
                    <div class="percentage" style="color:#fff">{{$pourcentage_in[0]}}%</div>
                    <div class="text">Ingénieur :</div>
                </div>

                <div class="radial-bar">
                    <svg x="0px" y="0px" viewBox="0 0 200 200">
                       <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                       <circle class="path path-9" cx="100" cy="100" r="80"></circle>
                    </svg>
                    <div class="percentage" style="color:#fff">{{$pourcentage_ts[0]}}%</div>
                    <div class="text">Technicien Supérieur :</div>
                </div>
            </div>
        </div>
    </section>


</body>
</x-masterAdmin>
<style>
 *
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-behavior: smooth;
    font-family: 'poppins',sans-serif;
}
body
{
    color:#fff;
    background: #081b29;

}
.sub-title{
    text-align: center;
  font-size: 60px;
  padding-bottom: 0px;
  padding-top: 0px;
}
.sub-title span{
    color: #0ef;
}
section{
    display: flex;
    flex-wrap: wrap;
}
.container1{
    width: 600px;
    height: 500px;
   /* padding: 75px 90px;*/
   padding: 10px 90px;
    margin-left: 120px;
}
.heading{
    /*text-align:center;
    text-decoration: underline;
    text-underline-offset: 10px;
    text-decoration-thickness: 5px;*/
    margin-bottom: 50px;
}
.bar{
    font-size :23px;
    position: relative;

}
.Technical-bars .bar{
    margin:40px 0;
}
.Technical-bars .bar:first-child{
    margin-top: 0;
}
.Technical-bars .bar:last-child{
    margin-bottom: 0;
}
.Technical-bars .bar .info{
    margin-bottom: 5px;
}

.Technical-bars .bar .info span{
    font-size: 17px;
    font-weight: 500;
    animation:showText 0.5s 1s linear forwards;
    opacity:0;
}

.Technical-bars .bar .progress-line{
    position: relative;
    border-radius: 10px;
    width: 100%;
    height: 7px;
    background-color: #000;
    animation: animate 1s cubic-bezier(1,0,0.5,1) forwards;
    transform: scaleX(0);
    transform-origin: left;
}
@keyframes animate{
    100%{
        transform: scaleX(1);
    }
}
.Technical-bars .bar .progress-line span{
    height: 100%;
    background-color: #0ef;
    position: absolute;
    border-radius: 10px;
    animation: animate 1s 1s cubic-bezier(1,0,0.5,1) forwards;
    transform: scaleX(0);
    transform-origin: left;
}
.progress-line.html span {
    width: {{$pourcentage_pfe[0]}}%; /* Remove the extra % symbol */
    position: relative;
}
.progress-line.css span{
    width :{{$pourcentage_im[0]}}%;
    position: relative;
}
.progress-line.javascript span{
    width :{{$pourcentage_en[0]}}%;
    position: relative;
}
.progress-line.python span{
    width :{{$pourcentage_te[0]}}%;
    position: relative;
}
.progress-line.react span{
    width :{{$pourcentage_li[0]}}%;
    position: relative;
}
.progress-line.php span{
    width :{{$pourcentage_ma[0]}}%;
    position: relative;
}
.progress-line.blade span{
    width :{{$pourcentage_do[0]}}%;
    position: relative;
}
.progress-line.js span{
    width :{{$pourcentage_in[0]}}%;
    position: relative;
}
.progress-line.java span{
    width :{{$pourcentage_ts[0]}}%;
    position: relative;
}
.progess-line span::after{
    position: absolute;
    padding: 1px 8px;
    background-color: #000;
    color: #fff;
    font-size: 12px;
    border-radius: 3px;
    top: -28px;
    right:0 ;
   /* right: -20px;*/
    animation :showText 0.5s 1.5s linear forwards;
    opacity: 0;
}

.progress-line.html span::after{
    content: "{{$count_pfe}}";
  position: relative;
  margin-left: {{ $pourcentage_pfe[0] * 4 }}px;
  padding-top: 18px;
  top: -28px;
}
.progress-line.css span::after{
    content :"{{$count_im}}";
    position: relative;
    margin-left: {{ $pourcentage_im[0] * 4 }}px;
  padding-top: 29px;
  top: -28px;
}
.progress-line.javascript span::after{
    content :"{{$count_en}}";
    position: relative;
    margin-left: {{ $pourcentage_en[0] * 4 }}px;
  padding-top: 29px;
  top: -28px;
}
.progress-line.python span::after{
    content :"{{$count_te}}";
    position: relative;
    margin-left: {{ $pourcentage_te[0] * 4 }}px;
  padding-top: 29px;
  top: -28px;
}
.progress-line.react span::after{
    content :"{{$count_li}}";
    position: relative;
    margin-left: {{ $pourcentage_li[0] * 4 }}px;
  padding-top: 29px;
  top: -28px;
}
.progress-line.php span::after{
    content :"{{$count_ma}}";
    position: relative;
    margin-left: {{ $pourcentage_ma[0] * 4 }}px;
  padding-top: 29px;
  top: -28px;
}
.progress-line.blade span::after{
    content :"{{$count_do}}";
    position: relative;
    margin-left: {{ $pourcentage_do[0] * 4 }}px;
  padding-top: 29px;
  top: -28px;
}
.progress-line.js span::after{
    content :"{{$count_in}}";
    position: relative;
    margin-left: {{ $pourcentage_in[0] * 4 }}px;
  padding-top: 29px;
  top: -28px;
}
.progress-line.java span::after{
    content :"{{$count_ts}}";
    position: relative;
    margin-left: {{ $pourcentage_ts[0] * 4 }}px;
  padding-top: 29px;
  top: -28px;
}
.progress-line span::before{
    content:"";
    position: absolute;
    width: 0;
    height: 0;
    border: 7px solid transparent;
    border-bottom-width: 0px;
    border-right-width: 0px;
    border-top-color: #000;
    top:-10px;
    right:0;
    animation: showText 0.5s 1.5s linear forwards;
    opacity: 0;


}
@keyframes showText{
    100%{
        opacity: 1;
    }
}

.radial-bars{
    width:100%;
    display: flex;
    flex-wrap:wrap;
    justify-content: space-evenly;
    align-items: flex-start;
}
.radial-bars .radial-bar{
    width: 50%;
    height: 180px;
    margin-bottom: 10px;
    position: relative;
}
.radial-bars .radial-bar svg{
    position: absolute;
    top:50%;
    left:50%;
    transform: translate(-50%, -50%) rotate(-90deg);
    width: 120px;
    height:160px;
}
.radial-bars .radial-bar .progress-bar{
    stroke-width:10;
    stroke:black;
    fill:transparent;
    stroke-dasharray: 502;
    stroke-dashoffset: 502;
    stroke-linecap: round;
    animation: animate-bar 1s linear forwards;
}
@keyframes animate-bar{
    100%{
        stroke-dashoffset: -1;
    }
}
.path{
    stroke-width: 10;
    stroke: #0ef;
    fill:transparent;
    stroke-dasharray: 502;
    stroke-dashoffset: 502;
    stroke-linecap: round;
}
.path-1{animation: animate-path1 1s 1s linear forwards;}
.path-2{animation: animate-path2 1s 1s linear forwards;}
.path-3{animation: animate-path3 1s 1s linear forwards;}
.path-4{animation: animate-path4 1s 1s linear forwards;}
.path-5{animation: animate-path5 1s 1s linear forwards;}
.path-6{animation: animate-path6 1s 1s linear forwards;}
.path-7{animation: animate-path7 1s 1s linear forwards;}
.path-8{animation: animate-path8 1s 1s linear forwards;}
.path-9{animation: animate-path9 1s 1s linear forwards;}

@keyframes animate-path1{
    100%{
        stroke-dashoffset: {{  (  (100-$pourcentage_pfe[0])/10)*50   }};
    }
}
@keyframes animate-path2{
    100%{
        stroke-dashoffset: {{  (  (100-$pourcentage_im[0])/10)*50   }};
    }
}
@keyframes animate-path3{
    100%{
        stroke-dashoffset: {{  (  (100-$pourcentage_en[0])/10)*50   }};
    }
}
@keyframes animate-path4{
    100%{
        stroke-dashoffset: {{  (  (100-$pourcentage_te[0])/10)*50   }};
    }
}
@keyframes animate-path5{
    100%{
        stroke-dashoffset: {{  (  (100-$pourcentage_li[0])/10)*50   }};
    }
}
@keyframes animate-path6{
    100%{
        stroke-dashoffset: {{  (  (100-$pourcentage_ma[0])/10)*50   }};
    }
}
@keyframes animate-path7{
    100%{
        stroke-dashoffset: {{  (  (100-$pourcentage_do[0])/10)*50   }};
    }
}
@keyframes animate-path8{
    100%{
        stroke-dashoffset: {{  (  (100-$pourcentage_in[0])/10)*50   }};
    }
}
@keyframes animate-path9{
    100%{
        stroke-dashoffset: {{  (  (100-$pourcentage_ts[0])/10)*50   }};
    }
}

.radial-bar .percentage{
    position: absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    font-size: 17px;
    font-weight: 500;
    animation: showText 0.5 1s linear forwards;
    opacity: 0;
    color: #fff;
}
.progress-bar .text{
    width: 100%;
    position: absolute;
    text-align: center;
    left: 50%;
    bottom: -5px;
    transform: translateX(-50%);
    font-size: 17px;
    font-weight: 500;
    animation: showText 0.5s 1s linear forwards;
    opacity: 0;
}
.heading1{
    margin-bottom: 25px;
}
.text{
    margin-left:20%;
}

</style>