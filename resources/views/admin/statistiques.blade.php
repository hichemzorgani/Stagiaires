<x-masterAdmin title="Statistiques">
        <p class="h1 sub-title">Statistiques <span>Stages</span></p>
        <section class="row">
            <div class="col-5">        
                <h3 class="heading">Pourcentage de Stages  <br> <span style="color: rgb(255, 123, 0);">Projet de Fin d'Études</span></h3>
                <div class="Technical-bars">         
                    <div class="bar">
                        <i class='bx bxl-html5'></i>
                        <div class="progress-line html pfe">
                            <span style="width: {{$pourcentage_pfe[0]}}%; position: absolute;"></span>
                            <p>{{$pourcentage_pfe[0]}}%</p>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">    
                <h3 class="heading">Pourcentage de Stages<br> <span style="color: rgb(255, 123, 0);">d'Immersion</span></h3>
                <div class="Technical-bars">
                    <div class="bar">
                        <i class='bx bxl-html5'></i>
                        <div class="progress-line html im">
                            <span style="width: {{$pourcentage_im[0]}}%; position: absolute;"></span>
                            <p>{{$pourcentage_im[0]}}%</p>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            
        </section>

</x-masterAdmin>
<style>

*{
            font-family: Tahoma, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            font-family: 'poppins',sans-serif;
        }
        body
        {
            color:#cbc7c7;
            background: #03131f;
        
        }
        .heading{
            margin-bottom: 30px;
        }
        .sub-title{
          text-align: center;
          margin-bottom: 40px;
        }
        .sub-title span{
            color: rgb(255, 123, 0);
        }
        section{
            display: flex;
            flex-wrap: wrap;
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
            height: 10px;
            background-color: #ffffff;
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
            background-color: rgb(255, 123, 0);
            position: absolute;
            border-radius: 10px;
            animation: animate 1s 1s cubic-bezier(1,0,0.5,1) forwards;
            transform: scaleX(0);
            transform-origin: left;
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
            animation :showText 0.5s 1.5s linear forwards;
            opacity: 0;
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

    .progress-line.html.pfe p {
        position: absolute;
        top: -33px; 
        left: {{$pourcentage_pfe[0]}}%; 
        transform: translateX(-50%);
        }   
    
        .progress-line.html.im p {
        position: absolute;
        top: -33px; 
        left: {{$pourcentage_im[0]}}%; 
        transform: translateX(-50%);
        } 

        .vertical-line {
        width: 2px; /* Adjust thickness as needed */
        height: 100px; /* Adjust height as needed */
        background-color: white;
    }

</style>