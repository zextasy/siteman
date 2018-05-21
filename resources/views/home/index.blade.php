@extends('layouts.master')
@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

<div class="slide-tmargin">
    <div class="slidermaxwidth">
      <div class="rev_slider">
        <!-- START REVOLUTION SLIDER 5.0 auto mode -->
        <div id="rev_slider" class="rev_slider"  data-version="5.0">
        <ul>

          <!-- SLIDE  -->
          <li data-index="rs-1" data-transition="fade">
            <!-- MAIN IMAGE -->
            <img src="{{url('dist/images/slider/slider-1.jpg')}}" alt=""  width="1920" height="1280">

            <!-- LAYER NR. 1 -->
            <div class="tp-caption roboto bold uppercase white tp-resizeme"
            id="slide-1-layer-1"
			data-x="['left','left','left','left']" data-hoffset="['50','50','0','0']"
			data-y="['top','top','top','top']" data-voffset="['220','80','40','20']"
			data-fontsize="['32','32','32','21']"
			data-lineheight="['42','42','42','30']"
			data-transform_idle="o:1;tO:0% 50%;"
			data-transform_in="x:-50px;rY:-90deg;opacity:0;s:2000;e:Back.easeOut;"
			data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
			data-start="1000"
			data-splitin="lines"
			data-splitout="none"
			data-responsive_offset="on"
			data-elementdelay="0.05"
			style="z-index: 6; white-space: nowrap; font-size: 30px; font-family: 'Oswald', sans-serif; color:#fff; line-height: 30px;"> welcome to </div>

            <!-- LAYER NR. 2 -->
            <div class="tp-caption roboto bold uppercase white tp-resizeme"
            id="slide-1-layer-2"
			data-x="['left','left','left','left']" data-hoffset="['50','50','0','0']"
			data-y="['top','top','top','top']" data-voffset="['300','160','120','80']"
			data-fontsize="['60','60','50','30']"
			data-lineheight="['70','70','70','50']"
			data-transform_idle="o:1;tO:0% 50%;"
			data-transform_in="x:-1000px;y:0px;opacity:0;s:1000;e:Power2.easeInOut;"
            data-transform_out="y:[175%];s:1500;e:Power2.easeInOut;s:1500;e:Power2.easeInOut;"
            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
            data-start="1000"
            data-splitin="none"
            data-splitout="none"
            data-responsive_offset="on"
            style="z-index: 6; white-space: nowrap; font-size: 30px; color:#fff; font-family: 'Oswald', sans-serif; line-height: 30px;">SITE  <span class="text-color-3"> MANAGEMENT </span> </div>

            <!-- LAYER NR. 3 -->
            <div class="tp-caption tp-resizeme"
            id="slide-1-layer-3"
            data-x="['left','left','left','left']" data-hoffset="['450','450','360','130']"
            data-y="['top','top','top','top']" data-voffset="['25','30','28','48']"
            data-width="" data-height="none"
            data-whitespace="nowrap"
            data-transform_idle="o:1;"
            data-transform_in="x:right;s:1500;e:Power3.easeOut;"
            data-transform_out="opacity:0;s:1500;e:Power4.easeIn;s:1500;e:Power4.easeIn;"
            data-start="700"
            data-responsive_offset="on"
            style="z-index: 5;text-transform:left;"> <img src="{{url('images/newimage.png')}}" alt="" /> </div>


            <!-- change picture up -->

            <!-- LAYER NR. 4 -->
           <!-- <div class="tp-caption tp-resizeme"
            id="slide-1-layer-4"
            data-x="['left','left','left','left']" data-hoffset="['650','580','400','200']"
            data-y="['top','top','top','top']" data-voffset="['330','270','270','420']"
            data-width="none" data-height="none"
            data-whitespace="nowrap"
            data-transform_idle="o:1;"
			data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
			data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
			data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
			data-start="1500"
			data-splitin="none"
			data-splitout="none"
			data-responsive_offset="on"
            style="z-index: 5;text-transform:left;"> <img  src="{{url('dist/images/slider/site-img03.png')}}" alt="" /> </div>-->

            <!-- LAYER NR. 5  inspire design
            <div class="tp-caption tp-resizeme"
            id="slide-1-layer-5"
            data-x="['left','left','left','left']" data-hoffset="['770','720','540','320']"
            data-y="['top','top','top','top']" data-voffset="['350','290','260','420']"
            data-width="none" data-height="none"
            data-whitespace="nowrap"
            data-transform_idle="o:1;"
			data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
			data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
			data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
			data-start="1000"
			data-splitin="none"
			data-splitout="none"
			data-responsive_offset="on"
            style="z-index: 5;text-transform:left;"> <img src="{{url('dist/images/slider/site-img02.png')}}" alt="" /> </div>-->

            <!-- LAYER NR. 6
            <div class="tp-caption tp-resizeme"
            id="slide-1-layer-6"
            data-x="['left','left','left','left']" data-hoffset="['630','593','390','260']"
            data-y="['top','top','top','top']" data-voffset="['420','380','370','540']"
            data-width="none" data-height="none"
            data-whitespace="nowrap"
            data-transform_idle="o:1;"
			data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
			data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
			data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
			data-start="2000"
			data-splitin="none"
			data-splitout="none"
			data-responsive_offset="on"
            style="z-index: 5;text-transform:left;"> <img src="{{url('dist/images/slider/site-img04.png')}}" alt="" /> </div>-->

            <!-- LAYER NR. 7 -->
            <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme"
            id="slide-1-layer-7"
			data-x="['left','left','left','left']" data-hoffset="['50','50','0','0']"
			data-y="['top','top','top','top']" data-voffset="['380','240','200','130']"
			data-width="375"
			data-height="2"
			data-whitespace="nowrap"
			data-transform_idle="o:1;"
			data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeOut;"
			data-transform_out="opacity:0;s:300;s:300;"
			data-mask_in="x:0px;y:0px;"
			data-start="2000"
			data-responsive_offset="on"
			style="z-index: 6;text-transform:left;background-color:#fff;border-color:rgba(0, 0, 0, 0);"> </div>

            <!-- LAYER NR. 8
            <div class="tp-caption roboto dark-grey uppercase white tp-resizeme"
            id="slide-1-layer-8"
			data-x="['left','left','left','left']" data-hoffset="['50','50','0','0']"
			data-y="['top','top','top','top']" data-voffset="['500','360','320','240']"
			data-fontsize="['14','14','14','14']"
			data-lineheight="['21','21','21','21']"
			data-transform_idle="o:1;tO:0% 50%;"
			data-transform_in="x:-1000px;y:0px;opacity:0;s:1000;e:Power2.easeInOut;"
            data-transform_out="y:[175%];s:1500;e:Power2.easeInOut;s:1500;e:Power2.easeInOut;"
            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
            data-start="1000"
            data-splitin="none"
            data-splitout="none"
            data-responsive_offset="on"
            style="z-index: 8; text-transform:none; letter-spacing:letter-spacing-2;  font-family: 'Oswald', sans-serif; white-space: nowrap; font-size: 30px; line-height: 30px;">Lorem ipsum dolor sit amet, consectetuer  adipiscing elit. Suspendisse <br/>
              et justo. Praesent <span class="text-color-3"> mattis  commodo augue </span> Aliquam ornare hendrerit <br/>
              augue Cras tellus In pulvinar . </div> -->

            <!-- LAYER NR. 9 -->
            <div class="tp-caption sbut1"
            id="slide-1-layer-9"
			data-x="['left','left','left','left']" data-hoffset="['50','50','0','0']"
			data-y="['top','top','top','top']" data-voffset="['400','260','220','140']"
			data-speed="800"
			data-start="3000"
			data-transform_in="x:-1000px;y:0px;opacity:0;s:1000;e:Power2.easeInOut;"
			data-transform_out="y:[175%];s:1500;e:Power2.easeInOut;s:1500;e:Power2.easeInOut;"
			data-endspeed="300"
			data-captionhidden="off"
			style="z-index: 10"> <a href="{{url('login')}}">LOGIN</a> </div>
          </li>

          <!-- SLIDE  -->
          <li data-index="rs-2" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="" data-description="">

            <!-- MAIN IMAGE -->
            <img  src="{{url('dist/images/slider/slider-2.jpg')}}" alt=""  data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 -500" data-offsetend="0 500" data-bgparallax="10" class="rev-slidebg" data-no-retina>

            <!-- LAYER NR. 1
            <div class="tp-caption raleway fweight-2 white uppercase tp-resizeme rs-parallaxlevel-0"
            id="slide-2-layer-1"
			data-x="['left','left','left','left']" data-hoffset="['50','50','0','0']"
			data-y="['top','top','top','top']" data-voffset="['360','220','210','150']"
			data-fontsize="['32','32','32','21']"
			data-lineheight="['42','42','42','32']"
			data-whitespace="nowrap"
			data-transform_in="y:[-100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;"
			data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
			data-mask_in="x:0px;y:0px;"
			data-mask_out="x:inherit;y:inherit;"
            data-start="1000"
            data-splitin="none"
            data-splitin="chars"
            data-responsive_offset="on"

           style="z-index: 6; white-space: nowrap; font-size: 30px; color:#fff; font-family: 'Oswald', sans-serif; line-height: 30px;">
            Site <span class="text-color-3"> Audit </span>
          </div>-->

          <!-- LAYER NR. 2 -->
          <div class="tp-caption roboto bold uppercase white tp-resizeme"
            id="slide-2-layer-2"
			data-x="['left','left','left','left']" data-hoffset="['50','50','0','0']"
			data-y="['top','top','top','top']" data-voffset="['300','160','150','90']"
			data-fontsize="['50','50','50','45']"
			data-lineheight="['70','70','70','50']"
			data-transform_idle="o:1;tO:0% 50%;"
			data-transform_in="x:-1000px;y:0px;opacity:0;s:1000;e:Power2.easeInOut;"
            data-transform_out="y:[175%];s:1500;e:Power2.easeInOut;s:1500;e:Power2.easeInOut;"
            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
            data-start="1000"
            data-splitin="none"
            data-splitout="none"
            data-responsive_offset="on"
            style="z-index: 6; white-space: nowrap; font-size: 30px; color:#fff; font-family: 'Oswald', sans-serif; line-height: 30px;"> <span class="text-color-3"> Site  </span> Audit </div>

          <!-- LAYER NR. 3 -->
          <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme"
            id="slide-2-layer-3"
			data-x="['left','left','left','left']" data-hoffset="['50','50','0','0']"
			data-y="['top','top','top','top']" data-voffset="['380','240','220','150']"
			data-width="375"
			data-height="2"
			data-whitespace="nowrap"
			data-transform_idle="o:1;"
			data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeOut;"
			data-transform_out="opacity:0;s:300;s:300;"
			data-mask_in="x:0px;y:0px;"
			data-start="2000"
			data-responsive_offset="on"
			style="z-index: 6;text-transform:left;background-color:#fff;border-color:rgba(0, 0, 0, 0);"> </div>

          <!-- LAYER NR. 4 -->
          <div class="tp-caption roboto dark-grey uppercase white tp-resizeme"
            id="slide-2-layer-4"
			data-x="['left','left','left','left']" data-hoffset="['50','50','0','0']"
			data-y="['top','top','top','top']" data-voffset="['400','260','230','160']"
			data-fontsize="['14','14','14','14']"
			data-lineheight="['21','21','21','21']"
			data-transform_idle="o:1;tO:0% 50%;"
			data-transform_in="x:-1000px;y:0px;opacity:0;s:1000;e:Power2.easeInOut;"
            data-transform_out="y:[175%];s:1500;e:Power2.easeInOut;s:1500;e:Power2.easeInOut;"
            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
            data-start="1000"
            data-splitin="none"
            data-splitout="none"
            data-responsive_offset="on"
            style="z-index: 8; text-transform:none; letter-spacing:letter-spacing-2;  font-family: 'Oswald', sans-serif; white-space: nowrap; font-size: 30px; line-height: 30px;">For Site Reviews & Evaluation
             </div>

          <!-- LAYER NR. 5 -->
          <div class="tp-caption tp-resizeme"
            id="slide-2-layer-5"
            data-x="['left','left','left','left']" data-hoffset="['430','430','220','0']"
            data-y="['top','top','top','top']" data-voffset="['45','35','33','40']"
            data-width="none" data-height="none"
            data-whitespace="nowrap"
            data-transform_idle="o:1;"
            data-transform_in="x:right;s:1500;e:Power3.easeOut;"
            data-transform_out="opacity:0;s:1500;e:Power4.easeIn;s:1500;e:Power4.easeIn;"
            data-start="700"
            data-responsive_offset="on"
            style="z-index: 5;text-transform:left;"> <img src="{{url('images/newsite.png')}}" alt="" /> </div>

          <!-- LAYER .6
          <div class="tp-caption tp-resizeme rs-parallaxlevel-0"
        id="slide-2-layer-6"
        data-x="['center','center','center','center']" data-hoffset="['-100','-80','-190','-210']"
        data-y="['center','center','center','center']" data-voffset="['0','-50','-50','-140']"
        data-fontsize="['32','32','21','18']"
        data-lineheight="['42','42','31','21']"
        data-width="700"
        data-height="none"
        data-color="#fff"
        data-transform_in="x:-1000px;y:0px;opacity:0;s:1000;e:Power2.easeInOut;"
        data-transform_out="y:[175%];s:1500;e:Power2.easeInOut;s:1500;e:Power2.easeInOut;"
        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
        data-start="1000"
        data-splitin="none"
        data-splitout="none"
        data-responsive_offset="on"

        style="z-index:7; font-weight:800;  text-transform:none; font-family: 'Oswald', sans-serif; text-align:right;  white-space: nowrap;"> Lot of <span class="text-color-3">things</span> <br/>
            and <span class="text-color-3">lakes of </span> questions </div>-->

          <!-- LAYER NR. 7 -->
          <div class="tp-caption sbut1"
            id="slide-2-layer-7"
			data-x="['left','left','left','left']" data-hoffset="['50','50','0','0']"
			data-y="['top','top','top','top']" data-voffset="['440','340','300','230']"
			data-speed="800"
			data-start="3000"
			data-transform_in="y:bottom;s:1500;e:Power3.easeOut;"
			data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;"
			data-endspeed="300"
			data-captionhidden="off"
			style="z-index: 6"> <a href="{{url('login')}}">Login</a> </div>

          <!-- LAYER NR. 8
          <div class="tp-caption sbut2"
            id="slide-2-layer-8"
			data-x="['left','left','left','left']" data-hoffset="['200','240','0','0']"
			data-y="['top','top','top','top']" data-voffset="['595','440','400','none']"
			data-speed="800"
			data-start="2000"
			data-transform_in="y:bottom;s:1500;e:Power3.easeOut;"
			data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;"
			data-endspeed="300"
			data-captionhidden="off"
			style="z-index: 6"> <a href="#">Purchase Nixon</a> </div>
          </li>
        </ul>
      </div>-->
      <!-- END REVOLUTION SLIDER -->
    </div>
  </div>


@stop