webpackJsonp([1],{"1F7i":function(t,e,a){"use strict";var n=a("ESvT"),i=a("Ry+L"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},"3d0h":function(t,e){},"80Rv":function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"loading"},[a("div",[a("md-progress-spinner",{staticClass:"md-accent",attrs:{"md-mode":"indeterminate"}}),t._v(" "),t.text?a("p",[t._v(t._s(t.text))]):t._e()],1)])},i=[],s={render:n,staticRenderFns:i};e.a=s},"870y":function(t,e,a){"use strict";var n=a("dhyH"),i=a("fji2"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},"8Gkn":function(t,e,a){"use strict";var n=a("nXZT"),i=a("WMH8"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},"8taH":function(t,e,a){"use strict";e.a={name:"loading",props:["text"],data:function(){return{}}}},"8x64":function(t,e,a){"use strict";var n=a("YRxr"),i=a("re42"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},CUS9:function(t,e,a){"use strict";var n=a("yGfX"),i=a("mW4/"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},CzkV:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"no-culprit finished"},[a("md-empty-state",{attrs:{"md-icon":"help_outline","md-label":"No Culprit Found"}},[a("p",[t._v("The culprit doesn't seem to be one of the suspected plugins. Here are some other possibilities:")]),t._v(" "),a("ul",[a("li",[t._v("Your theme or child theme")]),t._v(" "),t.activeCase.required_plugins.length?a("li",[t._v("One of the plugins you marked as required")]):t._e(),t._v(" "),a("li",[t._v("Any MU plugins installed on the site")])]),t._v(" "),a("md-button",{staticClass:"md-primary",attrs:{to:"/"}},[t._v("Start Over")])],1),t._v(" "),a("div",{staticClass:"corner-otto"},[a("bubble",[a("p",[t._v("Well, it's not a plugin. Here are some other ideas for what might be causing the issue.")]),t._v(" "),a("md-button",{staticClass:"md-primary md-raised",attrs:{to:"/"}},[t._v("Start Over")])],1),t._v(" "),a("img",{attrs:{src:t.updatedApi.static_url+"/robot-corner.svg",alt:"Otto the Robot"}})],1)],1)},i=[],s={render:n,staticRenderFns:i};e.a=s},ESvT:function(t,e,a){"use strict";e.a={name:"hello",data:function(){return{open:!0}},methods:{toggleOpen:function(){this.open=!this.open}}}},GDr1:function(t,e,a){"use strict";var n=a("McH0"),i=a("t3LG"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},GW27:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{attrs:{id:"app"}},[t.loading?a("loading",{attrs:{text:"Just a sec..."}}):t.error?[a("md-empty-state",{attrs:{"md-icon":"error_outline","md-label":"Uh oh.","md-description":"Something's gone wrong. Try refreshing the page."}})]:[a("md-button",{staticClass:"md-fab md-accent md-fab-top-left md-dense",attrs:{href:t.updatedApi.site_url+"/wp-admin"},nativeOn:{click:function(e){return t.resetCase(e)}}},[a("md-icon",[t._v("keyboard_backspace")]),t._v(" "),a("md-tooltip",{attrs:{"md-direction":"right"}},[t._v("Back to WordPress")])],1),t._v(" "),a("transition",{attrs:{name:"fade"}},[a("router-view")],1)],t._v(" "),a("md-dialog",{attrs:{"md-active":t.showLogin,"md-close-on-esc":!1,"md-click-outside-to-close":!1},on:{"update:mdActive":function(e){t.showLogin=e}}},[a("md-dialog-title",[t._v("Log In")]),t._v(" "),a("md-dialog-content",[t.loginError?a("p",[t._v(t._s(t.loginErrorMessage))]):a("p",[t._v("Enter your WordPress username and password to continue.")]),t._v(" "),a("form",{attrs:{novalidate:""},on:{submit:function(e){return e.preventDefault(),t.authenticate(e)}}},[a("md-field",[a("label",[t._v("Username")]),t._v(" "),a("md-input",{model:{value:t.lUsername,callback:function(e){t.lUsername=e},expression:"lUsername"}})],1),t._v(" "),a("md-field",[a("label",[t._v("Password")]),t._v(" "),a("md-input",{attrs:{type:"password"},model:{value:t.lPassword,callback:function(e){t.lPassword=e},expression:"lPassword"}})],1)],1)]),t._v(" "),a("md-dialog-actions",[a("md-button",{staticClass:"md-primary",on:{click:t.authenticate}},[t._v("Log In")])],1)],1)],2)},i=[],s={render:n,staticRenderFns:i};e.a=s},IHUC:function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("1F7i"),r=a("NYxO");e.a={name:"no-culprits-found",components:{Bubble:s.a},data:function(){return{}},computed:i()({},a.i(r.c)(["activeCase","api"]),a.i(r.d)(["updatedApi"]))}},IcnI:function(t,e,a){"use strict";var n=a("7+uW"),i=a("NYxO"),s=a("YaEn"),r=a("mUbh"),o=a("ukYY"),c=a("UjVw");n.default.use(i.e);var u={router:s.a,api:void 0,username:"",password:"",activeCase:void 0,user_id:void 0,requestProtocol:"http:"};e.a=new i.e.Store({state:u,actions:r.a,mutations:o.a,getters:c.a})},"InC+":function(t,e,a){"use strict";var n=a("r+Xo"),i=a("RIbl"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},Jpef:function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("IcnI"),r=a("NYxO"),o=a("CUS9"),c=a("8x64"),u=a("oWup"),l=a("L3nB");e.a={name:"complete",components:{NoCulpritFound:o.a,CulpritsFound:c.a,RequiredCulprits:u.a,BrokenLoop:l.a},store:s.a,data:function(){return{}},computed:i()({},a.i(r.c)(["activeCase"]))}},L3nB:function(t,e,a){"use strict";var n=a("qqaq"),i=a("W4fD"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},M93x:function(t,e,a){"use strict";function n(t){a("3d0h")}var i=a("xJD8"),s=a("GW27"),r=a("VU/8"),o=n,c=r(i.a,s.a,!1,o,null,null);e.a=c.exports},McH0:function(t,e,a){"use strict";var n=a("NxGh"),i=a("InC+");e.a={name:"counter-box",components:{Loading:n.a,PluginAvatar:i.a},props:{title:{type:String},loading:{type:Boolean},loadingmsg:{default:"",type:String},count:{default:0,type:Number},avatars:{default:function(){return[]},type:Array},display:{default:"",type:String}},data:function(){return{}}}},NHnr:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=a("7+uW"),i=a("M93x"),s=a("YaEn"),r=a("Lgyv"),o=a.n(r);n.default.config.productionTip=!1,n.default.use(o.a),new n.default({el:"#app",router:s.a,template:"<App/>",components:{App:i.a}})},NxGh:function(t,e,a){"use strict";var n=a("8taH"),i=a("80Rv"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},OS1B:function(t,e,a){"use strict";var n=a("y+gX"),i=a("fmpy"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},Q6Ig:function(t,e,a){"use strict";var n=a("Jpef"),i=a("zT1s"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},RIbl:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.plugin.icon?a("md-avatar",{staticClass:"checkbox-avatar",class:t.size},[a("img",{attrs:{src:t.plugin.icon,alt:t.plugin.Title},on:{error:t.replaceImage}}),t._v(" "),a("md-tooltip",{attrs:{"md-direction":"top"}},[t._v(t._s(t.plugin.Title))])],1):a("md-avatar",{staticClass:"md-avatar-icon checkbox-avatar md-accent",class:t.size},[t._v("\n  "+t._s(t.plugin.Title.charAt(0))+"\n  "),a("md-tooltip",{attrs:{"md-direction":"top"}},[t._v(t._s(t.plugin.Title))])],1)},i=[],s={render:n,staticRenderFns:i};e.a=s},"Ry+L":function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"bubble-wrap"},[t.open?a("div",{staticClass:"bubble"},[a("div",{staticClass:"close",on:{click:t.toggleOpen}},[a("md-icon",[t._v("close")])],1),t._v(" "),t._t("default")],2):a("div",{staticClass:"toggle"},[a("div",{staticClass:"open",on:{click:t.toggleOpen}},[a("md-icon",{staticClass:"md-accent"},[t._v("chat")])],1)])])},i=[],s={render:n,staticRenderFns:i};e.a=s},UVrX:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"hello"},[a("transition",{attrs:{appear:"",name:"fade"}},[t.loading?a("loading",{attrs:{text:"Checking records..."}}):a("div",[a("bubble",{key:"bubble"},[t.activeCase&&"open"===t.activeCase.status?a("p",[t._v("Looks like you already have an open case. Did you want to continue with that case? Or open a new one?")]):a("p",[t._v("Sorry you're having trouble with your site, but don't worry. Detective Otto Bot is on the case! Just click the button to open a new case and get started.")])]),t._v(" "),a("div",{key:"otto"},[a("img",{attrs:{src:t.updatedApi.static_url+"/robot-full.svg",alt:"Otto the Robot"}})]),t._v(" "),t.activeCase&&"open"===t.activeCase.status?a("md-button",{key:"continueButton",staticClass:"md-raised md-primary",on:{click:t.continueCase}},[t._v("Continue case")]):t._e(),t._v(" "),a("md-button",{key:"newButton",staticClass:"md-raised md-primary",on:{click:t.startNew}},[t._v("Open a new case")])],1)],1)],1)},i=[],s={render:n,staticRenderFns:i};e.a=s},UjVw:function(t,e,a){"use strict";var n=a("fZjL"),i=a.n(n),s=a("Gu7T"),r=a.n(s);e.a={interrogatingCount:function(t){return t.activeCase&&t.activeCase.suspects_under_interrogation?t.activeCase.suspects_under_interrogation.length:0},clearedCount:function(t){return t.activeCase&&t.activeCase.cleared_suspects?t.activeCase.cleared_suspects.length:0},remainingCount:function(t,e){return e.holdingCell.length},notHolding:function(t){return t.activeCase&&t.activeCase.cleared_suspects&&t.activeCase.suspects_under_interrogation?[].concat(r()(t.activeCase.cleared_suspects),r()(t.activeCase.suspects_under_interrogation)):[]},holdingCell:function(t,e){return t.activeCase&&t.activeCase.all_suspects?i()(t.activeCase.all_suspects).filter(function(t){return e.notHolding.indexOf(t)<0}):[]},updatedApi:function(t){if(void 0!==t.api){var e={};for(var a in t.api)if(t.api[a]&&"string"==typeof t.api[a]&&t.api[a].indexOf("http")>-1){var n=document.createElement("a");n.setAttribute("href",t.api[a]),e[a]=t.api[a].replace(n.protocol,t.requestProtocol)}else e[a]=t.api[a];return e}},updatedActiveCase:function(t){if(void 0!==t.activeCase){var e={};for(var a in t.activeCase)if(t.activeCase[a]&&"string"==typeof t.activeCase[a]&&t.activeCase[a].indexOf("http")>-1){var n=document.createElement("a");n.setAttribute("href",t.activeCase[a]),e[a]=t.activeCase[a].replace(n.protocol,t.requestProtocol)}else e[a]=t.activeCase[a];return e}}}},"V/xN":function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"screen",class:{loading:t.loading}},[t.loading?a("loading",{attrs:{text:"Getting your site..."}}):t._e(),t._v(" "),a("div",{staticClass:"frame-wrap"},[a("div",{staticClass:"frame-address"},[a("div",{staticClass:"site-base"},[t._v(t._s(t.urlBase))]),t._v(" "),a("div",{staticClass:"site-path"},[a("input",{attrs:{type:"text"},domProps:{value:t.urlPath},on:{keydown:t.updateUrl}})])]),t._v(" "),a("iframe",{attrs:{src:t.value,frameborder:"0"},on:{load:t.loaded}})])],1)},i=[],s={render:n,staticRenderFns:i};e.a=s},W4fD:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"no-culprit finished"},[a("md-empty-state",{attrs:{"md-icon":"help_outline","md-label":"Case Unsolved"}},[a("p",[t._v("I wasn't able to find the culprit because the clues contradicted one another. It's possible that:")]),t._v(" "),a("ul",[a("li",[t._v("There's a conflict between multiple plugins only seen when those plugins are active together.")]),t._v(" "),a("li",[t._v("The clues were incorrect.")])]),t._v(" "),a("md-button",{staticClass:"md-primary",attrs:{to:"/"}},[t._v("Start Over")])],1),t._v(" "),a("div",{staticClass:"corner-otto"},[a("bubble",[a("p",[t._v("Hmm...suspicious. The clues seem to conflict. Want to start a new case?")]),t._v(" "),a("md-button",{staticClass:"md-primary md-raised",attrs:{to:"/"}},[t._v("Start Over")])],1),t._v(" "),a("img",{attrs:{src:t.updatedApi.static_url+"/robot-corner.svg",alt:"Otto the Robot"}})],1)],1)},i=[],s={render:n,staticRenderFns:i};e.a=s},WMH8:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"witnesses"},[t.loading?a("loading",{attrs:{text:"Sorting out the suspects..."}}):[a("md-toolbar",{staticClass:"md-primary",attrs:{"md-elevation":"0"}},[a("h1",{staticClass:"md-title"},[t._v("Key Witnesses (Required Plugins)")])]),t._v(" "),a("md-content",[a("p",{staticClass:"md-body-2"},[t._v("Which plugins are required for the site's functionality?")])]),t._v(" "),a("md-list",t._l(t.activeCase.all_suspects,function(e){return a("md-list-item",{key:e.slug},[a("md-checkbox",{attrs:{value:e.plugin_file},model:{value:t.required,callback:function(e){t.required=e},expression:"required"}}),t._v(" "),a("plugin-avatar",{attrs:{slug:e.plugin_file}}),t._v(" "),a("span",{staticClass:"md-list-item-text"},[t._v("\n          "+t._s(e.Title)+"\n        ")])],1)})),t._v(" "),a("div",{staticClass:"corner-otto"},[a("bubble",[a("p",[t._v("Which plugins are required in order for the site to work correctly?")]),t._v(" "),a("md-button",{staticClass:"md-raised md-primary",nativeOn:{click:function(e){return t.sendRequired(e)}}},[t._v("I'm done")])],1),t._v(" "),a("img",{attrs:{src:t.updatedApi.static_url+"/robot-corner.svg",alt:"Otto the Robot"}})],1)]],2)},i=[],s={render:n,staticRenderFns:i};e.a=s},YRxr:function(t,e,a){"use strict";var n=a("pFYg"),i=a.n(n),s=a("Dd8w"),r=a.n(s),o=a("1F7i"),c=a("NxGh"),u=a("NYxO");e.a={name:"culprits-found",components:{Bubble:o.a,Loading:c.a},data:function(){return{iconMissing:!1,loading:!1}},computed:r()({culpritTitle:function(){return this.activeCase.culprits.length>1?"Culprits Found":"Culprit Found"},culpritString:function(){var t=this,e=this.activeCase.culprits.length>1?"The culprits are ":"The culprit is ";if(this.activeCase.culprits.length>1){var a=this.activeCase.culprits.slice(0);if(a&&a.length>1){console.log(void 0===a?"undefined":i()(a));var n=this.activeCase.all_suspects[a.pop()].Title;return a=a.map(function(e){return t.activeCase.all_suspects[e].Title}),e+a.join(", ")+", and "+n+"."}}else if(this.activeCase.all_suspects[this.activeCase.culprits[0]])return e+this.activeCase.all_suspects[this.activeCase.culprits[0]].Title;return""},today:function(){var t=new Date;return t.getMonth()+1+"/"+t.getDate()+"/"+t.getFullYear().toString().substr(-2)}},a.i(u.c)(["api","activeCase"]),a.i(u.d)(["updatedApi"])),methods:r()({arrestNo:function(){return Math.floor(1e3+9e3*Math.random())},middleClass:function(t){var e="";return t.length>10&&(e="medium-text"),t.length>20&&(e="small-text"),e},deactivateCulprit:function(t){var e=this;this.loading=!0,this.deactivatePlugins([t]).then(function(){e.loading=!1,e.deactivatePlugin(t)})},replaceImage:function(t){this.removeImage(t),this.iconMissing=!0}},a.i(u.b)(["defineCulprits","removeImage","deactivatePlugin"]),a.i(u.a)(["deactivatePlugins"]))}},YaEn:function(t,e,a){"use strict";var n=a("7+uW"),i=a("/ocq"),s=a("qSdX"),r=a("870y"),o=a("8Gkn"),c=a("OS1B"),u=a("ua3t"),l=a("Q6Ig");n.default.use(i.a),e.a=new i.a({routes:[{path:"/",name:"Hello",component:s.a},{path:"/find-the-problem",name:"Find the Problem",component:r.a},{path:"/key-witnesses",name:"Witnesses",component:o.a},{path:"/interrogating",name:"Interrogating",component:c.a},{path:"/test",name:"Test",component:u.a},{path:"/investigation-complete",name:"Complete",component:l.a}]})},b6pE:function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("IcnI"),r=a("1F7i"),o=a("pmwu"),c=a("GDr1"),u=a("NYxO");e.a={name:"test",components:{Bubble:r.a,ScreenField:o.a,CounterBox:c.a},store:s.a,data:function(){return{loading:!0}},computed:i()({iframeUrl:{get:function(){return this.updatedActiveCase.url},set:function(t){this.defineCaseUrl(t)}}},a.i(u.c)(["api","activeCase","router"]),a.i(u.d)(["clearedCount","remainingCount","holdingCell","interrogatingCount","updatedApi","updatedActiveCase"])),methods:i()({siteLoaded:function(){this.loading=!1},sendFixedClue:function(){var t=this;this.loading=!0,this.saveClue("fixed").then(function(){t.checkCaseStage()})},sendBrokenClue:function(){var t=this;this.loading=!0,this.saveClue("broken").then(function(){t.checkCaseStage()})},checkCaseStage:function(){"investigating"===this.activeCase.stage?this.router.push("/interrogating"):this.router.push("/investigation-complete")}},a.i(u.a)(["saveClue"]),a.i(u.b)(["defineCaseUrl"]))}},dhyH:function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("IcnI"),r=a("1F7i"),o=a("pmwu"),c=a("NYxO");e.a={name:"find-problem",components:{Bubble:r.a,ScreenField:o.a},store:s.a,data:function(){return{loading:!0}},beforeMount:function(){this.defineCaseUrl(this.updatedActiveCase.url?this.updatedActiveCase.url:this.updatedApi.site_url)},computed:i()({iframeUrl:{get:function(){return this.updatedActiveCase.url},set:function(t){this.defineCaseUrl(t)}}},a.i(c.c)(["api","activeCase"]),a.i(c.d)(["updatedActiveCase","updatedApi"])),methods:i()({siteLoaded:function(){this.loading=!1}},a.i(c.b)(["defineCaseUrl"]),a.i(c.a)(["updateCase"]))}},fji2:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"find-problem"},[a("screen-field",{on:{load:t.siteLoaded},model:{value:t.iframeUrl,callback:function(e){t.iframeUrl=e},expression:"iframeUrl"}}),t._v(" "),a("transition",{attrs:{name:"fade"}},[a("div",{directives:[{name:"show",rawName:"v-show",value:!t.loading,expression:"!loading"}],staticClass:"corner-otto"},[a("bubble",[t.updatedApi.site_url!==t.updatedActiveCase.url?a("p",[t._v("Is this still where you're seeing the issue? If not, navigate to where you are seeing the issue and let me know when you're there.")]):a("p",[t._v("Here's your site. Navigate to where you're seeing the problem. Let me know when you're there.")]),t._v(" "),a("md-button",{staticClass:"md-raised md-primary",attrs:{to:"/key-witnesses"},nativeOn:{click:function(e){return t.updateCase(e)}}},[t._v("I'm there")])],1),t._v(" "),a("img",{attrs:{src:t.updatedApi.static_url+"/robot-corner.svg",alt:"Otto the Robot"}})],1)])],1)},i=[],s={render:n,staticRenderFns:i};e.a=s},fmpy:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"interrogating"},[a("img",{staticClass:"light",attrs:{src:t.updatedApi.static_url+"/light.svg",alt:"Interrogation Room Light"}}),t._v(" "),a("div",[t.activeCase.suspects_under_interrogation.length?a("counter-box",{attrs:{title:"Interrogating",loading:t.loading,loadingmsg:"Checking clues...",count:t.interrogatingCount,avatars:t.activeCase.suspects_under_interrogation,display:"centered"}}):a("counter-box",{attrs:{title:"Interrogating",loading:t.loading,loadingmsg:"Checking clues...",count:t.remainingCount,avatars:t.holdingCell,display:"centered"}}),t._v(" "),a("div",{staticClass:"continue"},[a("router-link",{staticClass:"md-raised md-accent",attrs:{to:"/test",tag:"md-button"}},[t._v("\n        Start interrogation\n        "),a("md-icon",[t._v("play_arrow")])],1)],1)],1),t._v(" "),t.activeCase.suspects_under_interrogation.length?a("div",{staticClass:"more-suspects"},[a("counter-box",{attrs:{title:"Holding Cell",loading:t.loading,count:t.remainingCount,avatars:t.holdingCell}}),t._v(" "),a("counter-box",{attrs:{title:"Cleared",loading:t.loading,count:t.clearedCount,avatars:t.activeCase.cleared_suspects}})],1):t._e()])},i=[],s={render:n,staticRenderFns:i};e.a=s},i7VO:function(t,e,a){"use strict";var n=a("NxGh");e.a={name:"screen-field",props:["value"],components:{Loading:n.a},data:function(){return{loading:!0,initialized:!1}},computed:{urlParser:function(){var t=document.createElement("a");return t.href=this.value,t},urlBase:function(){return this.urlParser.origin},urlPath:function(){return this.urlParser.protocol="ftp://",this.urlParser.pathname+this.urlParser.search+this.urlParser.hash}},methods:{updateUrl:function(t){if(13===t.keyCode){var e=this.urlBase+t.target.value;this.$emit("input",e)}},loaded:function(){if(this.initialized){var t=document.getElementsByTagName("iframe")[0];this.$emit("input",t.contentWindow.location.href)}else this.initialized=!0,this.loading=!1,this.$emit("load")}}}},iOJy:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"find-problem"},[a("screen-field",{on:{load:t.siteLoaded},model:{value:t.iframeUrl,callback:function(e){t.iframeUrl=e},expression:"iframeUrl"}}),t._v(" "),t.loading?t._e():a("div",{staticClass:"interrogation-status"},[a("counter-box",{attrs:{title:"Interrogating",loading:t.loading,count:t.interrogatingCount,avatars:t.activeCase.suspects_under_interrogation}}),t._v(" "),a("counter-box",{attrs:{title:"Remaining",loading:t.loading,count:t.remainingCount,avatars:t.holdingCell}}),t._v(" "),a("counter-box",{attrs:{title:"Cleared",loading:t.loading,count:t.clearedCount,avatars:t.activeCase.cleared_suspects}})],1),t._v(" "),t.loading?t._e():a("div",{staticClass:"corner-otto"},[a("bubble",[a("p",[t._v("Here's your site again. Is the problem fixed?")]),t._v(" "),a("md-button",{staticClass:"md-raised md-accent",nativeOn:{click:function(e){return t.sendFixedClue(e)}}},[t._v("Yes it's fixed")]),t._v(" "),a("md-button",{staticClass:"md-raised md-primary",nativeOn:{click:function(e){return t.sendBrokenClue(e)}}},[t._v("No it's still broken")])],1),t._v(" "),a("img",{attrs:{src:t.updatedApi.static_url+"/robot-corner.svg",alt:"Otto the Robot"}})],1)],1)},i=[],s={render:n,staticRenderFns:i};e.a=s},mUbh:function(t,e,a){"use strict";var n=a("//Fk"),i=a.n(n),s=a("7t+N"),r=a.n(s),o=a("M4fF"),c=a.n(o);e.a={fetchApi:function(t){var e=t.commit;return new i.a(function(t,a){r.a.ajax({url:"local-get-app.php",method:"GET",dataType:"json",contentType:"application/json"}).done(function(a,n,i){e("defineApi",a),t()}).fail(function(t,e,n){a(n)})})},login:function(t){var e=t.commit,a=t.state,n=t.getters;return new i.a(function(t,i){r.a.ajax({url:n.updatedApi.api_url,method:"GET",dataType:"json",contentType:"application/json",data:{action:"authenticate",username:a.username,password:a.password}}).done(function(a,n,s){c.a.isEmpty(a.errors)?(e("defineNonce",a.data.nonce),t()):(i(a.errors),e("defineNonce",""))}).fail(function(t,e,a){i(a)})})},getActiveCase:function(t){var e=t.commit,a=t.state,n=t.getters;return new i.a(function(t,i){r.a.ajax({url:n.updatedApi.api_url,method:"POST",dataType:"json",data:{nonce:a.api.nonce,controller:"cases",action:"get_active",required_plugins:[]}}).done(function(a,n,s){c.a.isEmpty(a.errors)?(e("defineCase",a.data),t()):a.errors.no_active_case?(e("defineCase",{}),t()):i(a.errors)}).fail(function(t,e,a){i(a)})})},openCase:function(t){var e=t.commit,a=t.state,n=t.getters;return new i.a(function(t,i){r.a.ajax({url:n.updatedApi.api_url,method:"POST",dataType:"json",data:{nonce:a.api.nonce,controller:"cases",action:"open",required_plugins:[]}}).done(function(a,n,s){c.a.isEmpty(a.errors)?(e("defineCase",a.data),t()):i(a.errors)}).fail(function(t,e,a){i(a)})})},updateCase:function(t){var e=t.commit,a=t.state,n=t.getters;return new i.a(function(t,i){r.a.ajax({url:n.updatedApi.api_url,method:"POST",dataType:"json",data:{id:a.activeCase.id,nonce:a.api.nonce,controller:"cases",action:"update",required_plugins:a.activeCase.required_plugins,url:n.updatedActiveCase.url}}).done(function(a,n,s){c.a.isEmpty(a.errors)?(e("defineCase",a.data),t()):i(a.errors)}).fail(function(t,e,a){i(a)})})},closeCase:function(t){var e=t.commit,a=t.state,n=t.getters;return new i.a(function(t,i){r.a.ajax({url:n.updatedApi.api_url,method:"POST",dataType:"json",data:{nonce:a.api.nonce,controller:"cases",action:"close"}}).done(function(a,n,s){c.a.isEmpty(a.error)?(e("defineCase",a.data),t()):i(a.errors)}).fail(function(t,e,a){i(a)})})},suspendCase:function(t){var e=t.commit,a=t.state,n=t.getters;return new i.a(function(t,i){r.a.ajax({url:n.updatedApi.api_url,method:"POST",dataType:"json",data:{nonce:a.api.nonce,controller:"cases",action:"suspend"}}).done(function(a,n,s){c.a.isEmpty(a.error)?(e("defineCase",a.data),t()):i(a.errors)}).fail(function(t,e,a){i(a)})})},resetCase:function(t){var e=(t.commit,t.state),a=t.getters;return new i.a(function(t,n){r.a.ajax({url:a.updatedApi.api_url,method:"POST",dataType:"json",data:{nonce:e.api.nonce,controller:"cases",action:"close",reset_active_plugins:!0}}).done(function(e,a,i){c.a.isEmpty(e.error)?t():n(e.errors)}).fail(function(t,e,a){n(a)})})},interrogation:function(t){var e=t.commit,a=t.state,n=t.getters;return new i.a(function(t,i){r.a.ajax({url:n.updatedApi.api_url,method:"POST",dataType:"json",data:{nonce:a.api.nonce,controller:"cases",action:"review"}}).done(function(a,n,s){c.a.isEmpty(a.error)?(e("defineCase",a.data),t()):i(a.errors)}).fail(function(t,e,a){i(a)})})},saveClue:function(t,e){var a=t.commit,n=t.state,s=t.getters;return new i.a(function(t,i){r.a.ajax({url:s.updatedApi.api_url,method:"POST",dataType:"json",data:{outcome:e,nonce:n.api.nonce,controller:"clues",action:"create"}}).done(function(e,n,s){c.a.isEmpty(e.error)?(a("defineCase",e.data),t()):i(e.errors)}).fail(function(t,e,a){i(a)})})},deactivatePlugins:function(t,e){var a=(t.commit,t.state),n=t.getters;return new i.a(function(t,i){r.a.ajax({url:n.updatedApi.api_url,method:"POST",dataType:"json",data:{nonce:a.api.nonce,controller:"plugins",action:"deactivate",plugins:e}}).done(function(e,a,n){c.a.isEmpty(e.error)?t():i(e.errors)}).fail(function(t,e,a){i(a)})})}}},"mW4/":function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"no-culprit finished"},[a("md-empty-state",{attrs:{"md-icon":"help_outline","md-label":"Case Unsolved"}},[a("p",[t._v("I wasn't able to find the culprit causing this issue because the clues contradicted one another. Please try starting over. When interrogating suspects, please be careful about answering whether the problem is fixed or still broken.")]),t._v(" "),a("md-button",{staticClass:"md-primary",attrs:{to:"/"}},[t._v("Start Over")])],1),t._v(" "),a("div",{staticClass:"corner-otto"},[a("bubble",[a("p",[t._v("Hmm...suspicious. The clues seem to conflict. Want to start a new case?")]),t._v(" "),a("md-button",{staticClass:"md-primary md-raised",attrs:{to:"/"}},[t._v("Start Over")])],1),t._v(" "),a("img",{attrs:{src:t.updatedApi.static_url+"/robot-corner.svg",alt:"Otto the Robot"}})],1)],1)},i=[],s={render:n,staticRenderFns:i};e.a=s},nXZT:function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("IcnI"),r=a("1F7i"),o=a("InC+"),c=a("NYxO"),u=a("NxGh");e.a={name:"witnesses",components:{Bubble:r.a,Loading:u.a,PluginAvatar:o.a},store:s.a,data:function(){return{loading:!1}},computed:i()({required:{get:function(){return this.activeCase.required_plugins},set:function(t){this.defineRequired(t)}}},a.i(c.c)(["router","api","activeCase"]),a.i(c.d)(["updatedApi"])),methods:i()({sendRequired:function(){var t=this;this.loading=!0,this.updateCase().then(function(){t.router.push("/interrogating")}).catch(function(t){console.log(t)})}},a.i(c.b)(["defineRequired"]),a.i(c.a)(["updateCase"]))}},oWup:function(t,e,a){"use strict";var n=a("IHUC"),i=a("CzkV"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},pMZz:function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("IcnI"),r=a("NYxO"),o=a("1F7i"),c=a("NxGh");e.a={name:"hello",components:{Bubble:o.a,Loading:c.a},store:s.a,data:function(){return{loading:!0}},mounted:function(){var t=this;this.loading=!0,this.getActiveCase().then(function(){t.loading=!1,t.checkUrl()})},computed:i()({},a.i(r.c)(["api","activeCase","router","requestProtocol"]),a.i(r.d)(["updatedApi"])),methods:i()({checkUrl:function(){var t=new URLSearchParams(window.location.search),e=t.get("url");if(e){var a=document.createElement("a");a.setAttribute("href",e),a.protocol!==this.requestProtocol&&e.replace(a.protocol,this.requestProtocol)}this.defineCaseUrl(e||this.updatedApi.site_url)},startNew:function(){var t=this;this.loading=!0,this.activeCase&&"open"===this.activeCase.status?this.closeCase().then(function(){t.openCase().then(function(){t.router.push("/find-the-problem")})}):(this.loading=!0,this.openCase().then(function(){t.checkUrl(),t.updateCase().then(function(){t.router.push("/find-the-problem")})}))},continueCase:function(){this.activeCase.clues.length?this.router.push("/interrogating"):this.router.push("/find-the-problem")}},a.i(r.a)(["getActiveCase","openCase","closeCase","updateCase"]),a.i(r.b)(["defineCaseUrl"]))}},pmwu:function(t,e,a){"use strict";var n=a("i7VO"),i=a("V/xN"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},qSdX:function(t,e,a){"use strict";var n=a("pMZz"),i=a("UVrX"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},qqaq:function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("1F7i"),r=a("NYxO");e.a={name:"broken-loop",components:{Bubble:s.a},data:function(){return{}},computed:i()({},a.i(r.c)(["activeCase","api"]),a.i(r.d)(["updatedApi"]))}},"r+Xo":function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("IcnI"),r=a("NYxO");e.a={name:"plugin-avatar",store:s.a,props:{slug:{type:String},size:{default:"md-small",type:String}},data:function(){return{}},computed:i()({plugin:function(){return this.activeCase.all_suspects[this.slug]}},a.i(r.c)(["activeCase"])),methods:i()({replaceImage:function(){this.removeImage(this.plugin.plugin_file)}},a.i(r.b)(["removeImage"]))}},re42:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"finished culprits-found"},[t.loading?a("loading",{attrs:{text:"Deactivating"}}):[a("h2",{staticClass:"md-display-3"},[t._v(t._s(t.culpritTitle))]),t._v(" "),a("div",{staticClass:"results"},t._l(t.activeCase.culprits,function(e){return a("div",{staticClass:"result"},[a("div",{staticClass:"culprit-image"},[a("img",{staticClass:"bg",attrs:{src:t.updatedApi.static_url+"/mugshot.svg",alt:"mug shot"}}),t._v(" "),t.iconMissing?a("div",{staticClass:"plugin"},[a("span",{staticClass:"avatar-wrap"},[a("span",{staticClass:"avatar"},[t._v("\n                "+t._s(t.activeCase.all_suspects[e].Title.charAt(0))+"\n              ")])])]):a("img",{staticClass:"plugin",attrs:{src:t.activeCase.all_suspects[e].icon,alt:t.activeCase.all_suspects[e].Title},on:{error:function(a){t.replaceImage(e)}}}),t._v(" "),a("div",{staticClass:"sign-text"},[a("div",{staticClass:"top"},[a("div",{staticClass:"l"},[a("span",{staticClass:"text"},[t._v("WPPD-"+t._s(t.arrestNo()))])]),t._v(" "),a("div",{staticClass:"r"},[a("span",{staticClass:"text"},[t._v("WP Jail")])])]),t._v(" "),a("div",{staticClass:"middle",class:t.middleClass(t.activeCase.all_suspects[e].Title)},[a("div",{staticClass:"multiline-text"},[t._v(t._s(t.activeCase.all_suspects[e].Title))])]),t._v(" "),a("div",{staticClass:"bottom"},[a("div",{staticClass:"l"},[a("span",{staticClass:"text"},[t._v("Det. Otto Bot")])]),t._v(" "),a("div",{staticClass:"r"},[a("span",{staticClass:"text"},[t._v(t._s(t.today))])])])])]),t._v(" "),a("div",{staticClass:"culprit-info"},[a("p",[t._v("How would you like to deal with this culprit? You can deactivate "+t._s(t.activeCase.all_suspects[e].Title)+". Or you can leave it activated and sort out the problem on your own.")]),t._v(" "),a("md-button",{staticClass:"md-primary md-raised",attrs:{disabled:t.activeCase.all_suspects[e].deactivated},on:{click:function(a){t.deactivateCulprit(e)}}},[t._v("Deactivate it for me")]),t._v(" "),a("md-button",{staticClass:"md-primary md-raised",attrs:{href:t.updatedApi.site_url+"/wp-admin"}},[t._v("Return to WordPress dashboard")])],1)])})),t._v(" "),a("div",{staticClass:"corner-otto"},[a("bubble",[a("p",[t._v("Aha! "+t._s(t.culpritString)+".")])]),t._v(" "),a("img",{attrs:{src:t.updatedApi.static_url+"/robot-corner.svg",alt:"Otto the Robot"}})],1)]],2)},i=[],s={render:n,staticRenderFns:i};e.a=s},t3LG:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("md-card",{staticClass:"transparent text-centered",class:t.display},[a("md-card-header",[a("md-card-header-text",[a("h2",{staticClass:"md-title"},[t._v(t._s(t.title))])])],1),t._v(" "),a("md-card-content",[t.loading?a("loading",{attrs:{text:t.loadingmsg}}):a("div",{staticClass:"suspects-box"},[a("span",{staticClass:"number md-display-3"},[t._v(t._s(t.count))]),t._v(" "),a("span",{staticClass:"desc md-body-1"},[t._v(t._s(1===t.count?"suspect":"suspects"))])]),t._v(" "),t.avatars.length&&!t.loading?a("div",{staticClass:"suspects-list"},t._l(t.avatars,function(t){return a("plugin-avatar",{key:t,attrs:{slug:t,size:""}})})):t._e()],1)],1)},i=[],s={render:n,staticRenderFns:i};e.a=s},ua3t:function(t,e,a){"use strict";var n=a("b6pE"),i=a("iOJy"),s=a("VU/8"),r=s(n.a,i.a,!1,null,null,null);e.a=r.exports},ukYY:function(t,e,a){"use strict";var n=a("7+uW");e.a={defineApi:function(t,e){t.api=e},defineNonce:function(t,e){n.default.set(t.api,"nonce",e)},defineRequestProtocol:function(t,e){t.requestProtocol=e},defineUsername:function(t,e){t.username=e},definePassword:function(t,e){t.password=e},defineCaseUrl:function(t,e){t.activeCase&&n.default.set(t.activeCase,"url",e)},defineRequired:function(t,e){t.activeCase&&n.default.set(t.activeCase,"required_plugins",e)},defineCase:function(t,e){t.activeCase=e},defineUserId:function(t,e){t.user_id=e},removeImage:function(t,e){n.default.set(t.activeCase.all_suspects[e],"icon",null)},deactivatePlugin:function(t,e){n.default.set(t.activeCase.all_suspects[e],"deactivated",!0)}}},xJD8:function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("IcnI"),r=a("NYxO"),o=a("M4fF"),c=a.n(o),u=a("NxGh");e.a={name:"app",store:s.a,components:{Loading:u.a},data:function(){return{loading:!0,error:!1,localApi:window.app?window.app:{},getNonce:void 0,showLogin:!1,loginError:!1}},beforeMount:function(){var t=this;this.activeCase||this.router.push("/"),this.defineRequestProtocol(window.location.protocol),window.addEventListener("beforeunload",function(){t.resetCase()})},mounted:function(){var t=new URLSearchParams(window.location.search);this.defineUserId(t.get("session")?t.get("session"):void 0),this.getNonce=t.get("nonce")?t.get("nonce"):void 0,this.init()},methods:i()({init:function(){var t=this;return void 0!==this.api||c.a.isEmpty(this.localApi)?void 0===this.api?(this.loading=!0,void this.fetchApi().then(function(){t.api.nonce&&t.getActiveCase(),t.init()}).catch(function(e,a){t.loading=!1,t.error=!0,console.log("Error loading API")})):!this.api.nonce&&this.getNonce?(this.defineNonce(this.getNonce),this.getActiveCase().then(function(){t.showLogin=!1}).catch(function(e){t.showLogin=!0,console.log(e)}),void this.init()):this.api.nonce||this.getNonce?void(this.loading=!1):void(this.showLogin=!0):(this.defineApi(this.localApi),void this.init())},authenticate:function(){var t=this;this.login().then(function(){t.loginError=!1,t.showLogin=!1,t.api.nonce&&t.getActiveCase().then(function(){t.loading=!1})}).catch(function(e){t.loginError=e.authentication})}},a.i(r.a)(["fetchApi","login","getActiveCase","resetCase"]),a.i(r.b)(["defineApi","defineNonce","defineUsername","definePassword","defineUserId","defineRequestProtocol"])),computed:i()({loginErrorMessage:function(){switch(this.loginError){case"invalid_username":return"Your username is incorrect";case"incorrect_password":return"Your password is incorrect";case"permission_denied":return"You don't have permission to accesss Plugin Detective";default:return"Login error"}},lUsername:{get:function(){return this.username},set:function(t){this.defineUsername(t)}},lPassword:{get:function(){return this.password},set:function(t){this.definePassword(t)}}},a.i(r.c)(["api","username","password","user_id","activeCase","router"]),a.i(r.d)(["updatedApi"]))}},"y+gX":function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("IcnI"),r=a("NYxO"),o=a("NxGh"),c=a("InC+"),u=a("GDr1");e.a={name:"interrogating",store:s.a,components:{Loading:o.a,PluginAvatar:c.a,CounterBox:u.a},data:function(){return{loading:!0}},beforeMount:function(){var t=this;this.interrogation().then(function(){t.loading=!1})},computed:i()({},a.i(r.c)(["api","activeCase"]),a.i(r.d)(["interrogatingCount","clearedCount","remainingCount","notHolding","holdingCell","updatedApi"])),methods:i()({},a.i(r.a)(["interrogation"]))}},yGfX:function(t,e,a){"use strict";var n=a("Dd8w"),i=a.n(n),s=a("1F7i"),r=a("NYxO");e.a={name:"no-culprits-found",components:{Bubble:s.a},data:function(){return{}},computed:i()({},a.i(r.c)(["activeCase","api"]),a.i(r.d)(["updatedApi"]))}},zT1s:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("required_plugins_broken"===t.activeCase.outcome?"required-culprits":"broken_loop"===t.activeCase.outcome?"broken-loop":t.activeCase.culprits.length?"culprits-found":"no-culprit-found")},i=[],s={render:n,staticRenderFns:i};e.a=s}},["NHnr"]);
//# sourceMappingURL=app.js.map