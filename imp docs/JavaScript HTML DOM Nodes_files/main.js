(function(){var c=document,d="length",e=" translation",f=" using Google Translate?",k=".",l="Google has automatically translated this page to: ",m="Powered by ",n="Translate",p="Translate everything to ",q="Translate this page to: ",r="Translated to: ",s="Turn off ",t="Turn off for: ",u="View this page in: ",v="var ",w=this;function x(a,y){var g=a.split(k),b=w;g[0]in b||!b.execScript||b.execScript(v+g[0]);for(var h;g[d]&&(h=g.shift());)g[d]||void 0===y?b[h]?b=b[h]:b=b[h]={}:b[h]=y};var z={0:n,1:"Cancel",2:"Close",3:function(a){return l+a},4:function(a){return r+a},5:"Error: The server could not complete your request. Try again later.",6:"Learn more",7:function(a){return m+a},8:n,9:"Translation in progress",10:function(a){return q+(a+f)},11:function(a){return u+a},12:"Show original",13:"The content of this local file will be sent to Google for translation using a secure connection.",14:"The content of this secure page will be sent to Google for translation using a secure connection.",
15:"The content of this intranet page will be sent to Google for translation using a secure connection.",16:"Select Language",17:function(a){return s+(a+e)},18:function(a){return t+a},19:"Always hide",20:"Original text:",21:"Contribute a better translation",22:"Contribute",23:"Translate all",24:"Restore all",25:"Cancel all",26:"Translate sections to my language",27:function(a){return p+a},28:"Show original languages",29:"Options",30:"Turn off translation for this site",31:null,32:"Show alternative translations",
33:"Click on words above to get alternative translations",34:"Use",35:"Drag with shift key to reorder",36:"Click for alternative translations",37:"Hold down the shift key, click, and drag the words above to reorder.",38:"Thank you for contributing your translation suggestion to Google Translate.",39:"Manage translation for this site",40:"Click a word for alternative translations, or double-click to edit directly",41:"Original text",42:n,43:n,44:"Your correction has been submitted.",45:"Error: The language of the webpage is not supported."};var A=window.google&&google.translate&&google.translate._const;
if(A){var B;t:{for(var C=[],D=["24,0.01,20141018"],E=0;E<D[d];++E){var F=D[E].split(","),G=F[0];if(G){var H=Number(F[1]);if(!(!H||.1<H||0>H)){var I=Number(F[2]),J=new Date,K=1E4*J.getFullYear()+100*(J.getMonth()+1)+J.getDate();!I||I<K||C.push({version:G,a:H,b:I})}}}for(var L=0,M=window.location.href.match(/google\.translate\.element\.random=([\d\.]+)/),N=Number(M&&M[1])||Math.random(),E=0;E<C[d];++E){var O=C[E],L=L+O.a;if(1<=L)break;if(N<L){B=O.version;break t}}B="23"}var P="/translate_static/js/element/%s/element_main.js".replace("%s",
B);if("0"==B){var Q=" translate_static js element %s element_main.js".split(" ");Q[Q[d]-1]="main.js";P=Q.join("/").replace("%s",B)}if(A._cjlc)A._cjlc(A._pas+A._pah+P);else{var R=A._pas+A._pah+P,S=c.createElement("script");S.type="text/javascript";S.charset="UTF-8";S.src=R;var T=c.getElementsByTagName("head")[0];T||(T=c.body.parentNode.appendChild(c.createElement("head")));T.appendChild(S)}x("google.translate.m",z);x("google.translate.v",B)};})()
