/**
 * Created by Administrator on 2017/3/19.
 */
if(typeof doyoo=='undefined' || !doyoo){
    var d_genId=function(){
        var id ='',ids='0123456789abcdef';
        for(var i=0;i<34;i++){ id+=ids.charAt(Math.floor(Math.random()*16));  }  return id;
    };
    var doyoo={
        env:{
            secure:false,
            mon:'http://m9104.talk99.cn/monitor',
            chat:'http://chat7122a.talk99.cn/chat',
            file:'http://yun-static.soperson.com/131221',
            compId:10026832,
            confId:10028876,
            vId:d_genId(),
            lang:'sc',
            fixFlash:1,
            subComp:0,
            _mark:'dd5c69ce861e8729077b0783d42e6399813c8c1423b7f3acc5cb40a9000ead4198e86075fdeb1828'
        }

        , monParam:{
            index:15,
            preferConfig:0,

            title:'\u706b\u7206\u62db\u5546\u52a0\u76df\u4e2d\uff01',
            text:'\u60a8\u597d\uff0c\u6b22\u8fce\u5149\u4e34\u672c\u7ad9\uff0c\u6211\u662f\u4eca\u5929\u7684\u5728\u7ebf\u670d\u52a1\u4eba\u5458\uff0c\u70b9\u51fb\u5f00\u59cb\u4ea4\u8c08\u5373\u53ef\u4e0e\u6211\u6c9f\u901a ',
            auto:-1,
            group:'10031794',
            start:'00:00',
            end:'24:00',
            mask:false,
            status:false,
            fx:4,
            mini:1,
            pos:1,
            offShow:0,
            loop:180,
            autoHide:0,
            hidePanel:0,
            miniStyle:'2',
            miniWidth:'340',
            miniHeight:'490',
            showPhone:1,
            monHideStatus:[0,0,0],
            monShowOnly:'',
            autoDirectChat:-1,
            allowMobileDirect:0,
            minBallon:1,
            chatFollow:1
        }


        , panelParam:{
            category:'icon',
            preferConfig:0,
            position:0,
            vertical:100,
            horizon:5


            ,mode:1,
            target:'10031794',
            online:'http://www.vistart.com.cn/UploadFiles/FCK/20121031103958_auhxjg.gif',
            offline:'http://www.vistart.com.cn/UploadFiles/FCK/20121031103958_auhxjg.gif',
            width:150,
            height:410,
            status:0,
            closable:1,
            regions:[{type:"2",l:"10",t:"230",w:"130",h:"25",bk:"http://www.vistart.com.cn/UploadFiles/FCK/20121029164029_viashw.gif",v:"10031794"},{type:"2",l:"10",t:"260",w:"130",h:"25",bk:"http://www.vistart.com.cn/UploadFiles/FCK/20121029164046_shxjys.gif",v:"10031794"},{type:"2",l:"10",t:"290",w:"130",h:"25",bk:"http://www.vistart.com.cn/UploadFiles/FCK/20121029164057_mnpsxj.gif",v:"10031794"},{type:"2",l:"10",t:"320",w:"130",h:"25",bk:"http://www.vistart.com.cn/UploadFiles/FCK/20121029164116_cmxykn.gif",v:"10031794"},{type:"0",l:"10",t:"140",w:"130",h:"25",bk:"http://www.vistart.com.cn/UploadFiles/FCK/20121029164136_njxgla.gif",v:"2498171724"},{type:"0",l:"10",t:"170",w:"130",h:"25",bk:"http://www.vistart.com.cn/UploadFiles/FCK/20121029164212_yidcpb.gif",v:"443679023"},{type:"1",l:"10",t:"200",w:"130",h:"25",bk:"http://www.vistart.com.cn/UploadFiles/FCK/20121029164223_sovloq.gif",v:"vistart100@hotmail.com"},{type:"3",l:"10",t:"350",w:"130",h:"25",bk:"http://www.vistart.com.cn/UploadFiles/FCK/20121029165518_dcikih.gif",v:"10031794"}],
            collapse:0



        }


        ,msgParam:{
            title:'\u6b22\u8fce\u7ed9\u6211\u4eec\u7559\u8a00',
            index:3,
            pos:1,
            group:10031794,
            delay:2,
            hidePhone:0
        }


    };

    if(typeof talk99Init == 'function'){
        talk99Init(doyoo);
    }
    if(!document.getElementById('doyoo_panel')){
        var supportJquery=typeof jQuery!='undefined';
        var doyooWrite=function(html){
            document.writeln(html);
        }

        doyooWrite('<div id="doyoo_panel"></div>');


        doyooWrite('<div id="doyoo_monitor"></div>');


        doyooWrite('<div id="talk99_message"></div>')

        doyooWrite('<div id="doyoo_share" style="display:none;"></div>');
        doyooWrite('<lin'+'k rel="stylesheet" type="text/css" href="http://yun-static.soperson.com/131221/talk99.css?150728"></li'+'nk>');
        doyooWrite('<scr'+'ipt type="text/javascript" src="http://yun-static.soperson.com/131221/talk99.js?17012101" charset="utf-8"></scr'+'ipt>');
    }
}
