"use strict";(()=>{var yt=Object.defineProperty;var _t=Object.getOwnPropertyDescriptor;var y=(r,t,e,s)=>{for(var i=s>1?void 0:s?_t(t,e):t,n=r.length-1,o;n>=0;n--)(o=r[n])&&(i=(s?o(t,e,i):o(i))||i);return s&&i&&yt(t,e,i),i};var M=globalThis,z=M.ShadowRoot&&(M.ShadyCSS===void 0||M.ShadyCSS.nativeShadow)&&"adoptedStyleSheets"in Document.prototype&&"replace"in CSSStyleSheet.prototype,V=Symbol(),tt=new WeakMap,j=class{constructor(t,e,s){if(this._$cssResult$=!0,s!==V)throw Error("CSSResult is not constructable. Use `unsafeCSS` or `css` instead.");this.cssText=t,this.t=e}get styleSheet(){let t=this.o,e=this.t;if(z&&t===void 0){let s=e!==void 0&&e.length===1;s&&(t=tt.get(e)),t===void 0&&((this.o=t=new CSSStyleSheet).replaceSync(this.cssText),s&&tt.set(e,t))}return t}toString(){return this.cssText}},et=r=>new j(typeof r=="string"?r:r+"",void 0,V),K=(r,...t)=>{let e=r.length===1?r[0]:t.reduce((s,i,n)=>s+(o=>{if(o._$cssResult$===!0)return o.cssText;if(typeof o=="number")return o;throw Error("Value passed to 'css' function must be a 'css' function result: "+o+". Use 'unsafeCSS' to pass non-literal values, but take care to ensure page security.")})(i)+r[n+1],r[0]);return new j(e,r,V)},F=(r,t)=>{if(z)r.adoptedStyleSheets=t.map(e=>e instanceof CSSStyleSheet?e:e.styleSheet);else for(let e of t){let s=document.createElement("style"),i=M.litNonce;i!==void 0&&s.setAttribute("nonce",i),s.textContent=e.cssText,r.appendChild(s)}},L=z?r=>r:r=>r instanceof CSSStyleSheet?(t=>{let e="";for(let s of t.cssRules)e+=s.cssText;return et(e)})(r):r;var{is:vt,defineProperty:At,getOwnPropertyDescriptor:wt,getOwnPropertyNames:bt,getOwnPropertySymbols:Et,getPrototypeOf:St}=Object,D=globalThis,st=D.trustedTypes,xt=st?st.emptyScript:"",Ct=D.reactiveElementPolyfillSupport,P=(r,t)=>r,k={toAttribute(r,t){switch(t){case Boolean:r=r?xt:null;break;case Object:case Array:r=r==null?r:JSON.stringify(r)}return r},fromAttribute(r,t){let e=r;switch(t){case Boolean:e=r!==null;break;case Number:e=r===null?null:Number(r);break;case Object:case Array:try{e=JSON.parse(r)}catch{e=null}}return e}},I=(r,t)=>!vt(r,t),it={attribute:!0,type:String,converter:k,reflect:!1,hasChanged:I};Symbol.metadata??=Symbol("metadata"),D.litPropertyMetadata??=new WeakMap;var g=class extends HTMLElement{static addInitializer(t){this._$Ei(),(this.l??=[]).push(t)}static get observedAttributes(){return this.finalize(),this._$Eh&&[...this._$Eh.keys()]}static createProperty(t,e=it){if(e.state&&(e.attribute=!1),this._$Ei(),this.elementProperties.set(t,e),!e.noAccessor){let s=Symbol(),i=this.getPropertyDescriptor(t,s,e);i!==void 0&&At(this.prototype,t,i)}}static getPropertyDescriptor(t,e,s){let{get:i,set:n}=wt(this.prototype,t)??{get(){return this[e]},set(o){this[e]=o}};return{get(){return i?.call(this)},set(o){let d=i?.call(this);n.call(this,o),this.requestUpdate(t,d,s)},configurable:!0,enumerable:!0}}static getPropertyOptions(t){return this.elementProperties.get(t)??it}static _$Ei(){if(this.hasOwnProperty(P("elementProperties")))return;let t=St(this);t.finalize(),t.l!==void 0&&(this.l=[...t.l]),this.elementProperties=new Map(t.elementProperties)}static finalize(){if(this.hasOwnProperty(P("finalized")))return;if(this.finalized=!0,this._$Ei(),this.hasOwnProperty(P("properties"))){let e=this.properties,s=[...bt(e),...Et(e)];for(let i of s)this.createProperty(i,e[i])}let t=this[Symbol.metadata];if(t!==null){let e=litPropertyMetadata.get(t);if(e!==void 0)for(let[s,i]of e)this.elementProperties.set(s,i)}this._$Eh=new Map;for(let[e,s]of this.elementProperties){let i=this._$Eu(e,s);i!==void 0&&this._$Eh.set(i,e)}this.elementStyles=this.finalizeStyles(this.styles)}static finalizeStyles(t){let e=[];if(Array.isArray(t)){let s=new Set(t.flat(1/0).reverse());for(let i of s)e.unshift(L(i))}else t!==void 0&&e.push(L(t));return e}static _$Eu(t,e){let s=e.attribute;return s===!1?void 0:typeof s=="string"?s:typeof t=="string"?t.toLowerCase():void 0}constructor(){super(),this._$Ep=void 0,this.isUpdatePending=!1,this.hasUpdated=!1,this._$Em=null,this._$Ev()}_$Ev(){this._$ES=new Promise(t=>this.enableUpdating=t),this._$AL=new Map,this._$E_(),this.requestUpdate(),this.constructor.l?.forEach(t=>t(this))}addController(t){(this._$EO??=new Set).add(t),this.renderRoot!==void 0&&this.isConnected&&t.hostConnected?.()}removeController(t){this._$EO?.delete(t)}_$E_(){let t=new Map,e=this.constructor.elementProperties;for(let s of e.keys())this.hasOwnProperty(s)&&(t.set(s,this[s]),delete this[s]);t.size>0&&(this._$Ep=t)}createRenderRoot(){let t=this.shadowRoot??this.attachShadow(this.constructor.shadowRootOptions);return F(t,this.constructor.elementStyles),t}connectedCallback(){this.renderRoot??=this.createRenderRoot(),this.enableUpdating(!0),this._$EO?.forEach(t=>t.hostConnected?.())}enableUpdating(t){}disconnectedCallback(){this._$EO?.forEach(t=>t.hostDisconnected?.())}attributeChangedCallback(t,e,s){this._$AK(t,s)}_$EC(t,e){let s=this.constructor.elementProperties.get(t),i=this.constructor._$Eu(t,s);if(i!==void 0&&s.reflect===!0){let n=(s.converter?.toAttribute!==void 0?s.converter:k).toAttribute(e,s.type);this._$Em=t,n==null?this.removeAttribute(i):this.setAttribute(i,n),this._$Em=null}}_$AK(t,e){let s=this.constructor,i=s._$Eh.get(t);if(i!==void 0&&this._$Em!==i){let n=s.getPropertyOptions(i),o=typeof n.converter=="function"?{fromAttribute:n.converter}:n.converter?.fromAttribute!==void 0?n.converter:k;this._$Em=i,this[i]=o.fromAttribute(e,n.type),this._$Em=null}}requestUpdate(t,e,s){if(t!==void 0){if(s??=this.constructor.getPropertyOptions(t),!(s.hasChanged??I)(this[t],e))return;this.P(t,e,s)}this.isUpdatePending===!1&&(this._$ES=this._$ET())}P(t,e,s){this._$AL.has(t)||this._$AL.set(t,e),s.reflect===!0&&this._$Em!==t&&(this._$Ej??=new Set).add(t)}async _$ET(){this.isUpdatePending=!0;try{await this._$ES}catch(e){Promise.reject(e)}let t=this.scheduleUpdate();return t!=null&&await t,!this.isUpdatePending}scheduleUpdate(){return this.performUpdate()}performUpdate(){if(!this.isUpdatePending)return;if(!this.hasUpdated){if(this.renderRoot??=this.createRenderRoot(),this._$Ep){for(let[i,n]of this._$Ep)this[i]=n;this._$Ep=void 0}let s=this.constructor.elementProperties;if(s.size>0)for(let[i,n]of s)n.wrapped!==!0||this._$AL.has(i)||this[i]===void 0||this.P(i,this[i],n)}let t=!1,e=this._$AL;try{t=this.shouldUpdate(e),t?(this.willUpdate(e),this._$EO?.forEach(s=>s.hostUpdate?.()),this.update(e)):this._$EU()}catch(s){throw t=!1,this._$EU(),s}t&&this._$AE(e)}willUpdate(t){}_$AE(t){this._$EO?.forEach(e=>e.hostUpdated?.()),this.hasUpdated||(this.hasUpdated=!0,this.firstUpdated(t)),this.updated(t)}_$EU(){this._$AL=new Map,this.isUpdatePending=!1}get updateComplete(){return this.getUpdateComplete()}getUpdateComplete(){return this._$ES}shouldUpdate(t){return!0}update(t){this._$Ej&&=this._$Ej.forEach(e=>this._$EC(e,this[e])),this._$EU()}updated(t){}firstUpdated(t){}};g.elementStyles=[],g.shadowRootOptions={mode:"open"},g[P("elementProperties")]=new Map,g[P("finalized")]=new Map,Ct?.({ReactiveElement:g}),(D.reactiveElementVersions??=[]).push("2.0.4");var Y=globalThis,q=Y.trustedTypes,rt=q?q.createPolicy("lit-html",{createHTML:r=>r}):void 0,ht="$lit$",_=`lit$${(Math.random()+"").slice(9)}$`,ct="?"+_,jt=`<${ct}>`,E=document,T=()=>E.createComment(""),R=r=>r===null||typeof r!="object"&&typeof r!="function",pt=Array.isArray,Pt=r=>pt(r)||typeof r?.[Symbol.iterator]=="function",Z=`[ 	
\f\r]`,U=/<(?:(!--|\/[^a-zA-Z])|(\/?[a-zA-Z][^>\s]*)|(\/?$))/g,nt=/-->/g,ot=/>/g,w=RegExp(`>|${Z}(?:([^\\s"'>=/]+)(${Z}*=${Z}*(?:[^ 	
\f\r"'\`<>=]|("|')|))|$)`,"g"),at=/'/g,lt=/"/g,ut=/^(?:script|style|textarea|title)$/i,mt=r=>(t,...e)=>({_$litType$:r,strings:t,values:e}),u=mt(1),Dt=mt(2),S=Symbol.for("lit-noChange"),c=Symbol.for("lit-nothing"),dt=new WeakMap,b=E.createTreeWalker(E,129);function ft(r,t){if(!Array.isArray(r)||!r.hasOwnProperty("raw"))throw Error("invalid template strings array");return rt!==void 0?rt.createHTML(t):t}var kt=(r,t)=>{let e=r.length-1,s=[],i,n=t===2?"<svg>":"",o=U;for(let d=0;d<e;d++){let a=r[d],h,p,l=-1,f=0;for(;f<a.length&&(o.lastIndex=f,p=o.exec(a),p!==null);)f=o.lastIndex,o===U?p[1]==="!--"?o=nt:p[1]!==void 0?o=ot:p[2]!==void 0?(ut.test(p[2])&&(i=RegExp("</"+p[2],"g")),o=w):p[3]!==void 0&&(o=w):o===w?p[0]===">"?(o=i??U,l=-1):p[1]===void 0?l=-2:(l=o.lastIndex-p[2].length,h=p[1],o=p[3]===void 0?w:p[3]==='"'?lt:at):o===lt||o===at?o=w:o===nt||o===ot?o=U:(o=w,i=void 0);let $=o===w&&r[d+1].startsWith("/>")?" ":"";n+=o===U?a+jt:l>=0?(s.push(h),a.slice(0,l)+ht+a.slice(l)+_+$):a+_+(l===-2?d:$)}return[ft(r,n+(r[e]||"<?>")+(t===2?"</svg>":"")),s]},N=class r{constructor({strings:t,_$litType$:e},s){let i;this.parts=[];let n=0,o=0,d=t.length-1,a=this.parts,[h,p]=kt(t,e);if(this.el=r.createElement(h,s),b.currentNode=this.el.content,e===2){let l=this.el.content.firstChild;l.replaceWith(...l.childNodes)}for(;(i=b.nextNode())!==null&&a.length<d;){if(i.nodeType===1){if(i.hasAttributes())for(let l of i.getAttributeNames())if(l.endsWith(ht)){let f=p[o++],$=i.getAttribute(l).split(_),H=/([.?@])?(.*)/.exec(f);a.push({type:1,index:n,name:H[2],strings:$,ctor:H[1]==="."?G:H[1]==="?"?Q:H[1]==="@"?W:C}),i.removeAttribute(l)}else l.startsWith(_)&&(a.push({type:6,index:n}),i.removeAttribute(l));if(ut.test(i.tagName)){let l=i.textContent.split(_),f=l.length-1;if(f>0){i.textContent=q?q.emptyScript:"";for(let $=0;$<f;$++)i.append(l[$],T()),b.nextNode(),a.push({type:2,index:++n});i.append(l[f],T())}}}else if(i.nodeType===8)if(i.data===ct)a.push({type:2,index:n});else{let l=-1;for(;(l=i.data.indexOf(_,l+1))!==-1;)a.push({type:7,index:n}),l+=_.length-1}n++}}static createElement(t,e){let s=E.createElement("template");return s.innerHTML=t,s}};function x(r,t,e=r,s){if(t===S)return t;let i=s!==void 0?e._$Co?.[s]:e._$Cl,n=R(t)?void 0:t._$litDirective$;return i?.constructor!==n&&(i?._$AO?.(!1),n===void 0?i=void 0:(i=new n(r),i._$AT(r,e,s)),s!==void 0?(e._$Co??=[])[s]=i:e._$Cl=i),i!==void 0&&(t=x(r,i._$AS(r,t.values),i,s)),t}var J=class{constructor(t,e){this._$AV=[],this._$AN=void 0,this._$AD=t,this._$AM=e}get parentNode(){return this._$AM.parentNode}get _$AU(){return this._$AM._$AU}u(t){let{el:{content:e},parts:s}=this._$AD,i=(t?.creationScope??E).importNode(e,!0);b.currentNode=i;let n=b.nextNode(),o=0,d=0,a=s[0];for(;a!==void 0;){if(o===a.index){let h;a.type===2?h=new O(n,n.nextSibling,this,t):a.type===1?h=new a.ctor(n,a.name,a.strings,this,t):a.type===6&&(h=new X(n,this,t)),this._$AV.push(h),a=s[++d]}o!==a?.index&&(n=b.nextNode(),o++)}return b.currentNode=E,i}p(t){let e=0;for(let s of this._$AV)s!==void 0&&(s.strings!==void 0?(s._$AI(t,s,e),e+=s.strings.length-2):s._$AI(t[e])),e++}},O=class r{get _$AU(){return this._$AM?._$AU??this._$Cv}constructor(t,e,s,i){this.type=2,this._$AH=c,this._$AN=void 0,this._$AA=t,this._$AB=e,this._$AM=s,this.options=i,this._$Cv=i?.isConnected??!0}get parentNode(){let t=this._$AA.parentNode,e=this._$AM;return e!==void 0&&t?.nodeType===11&&(t=e.parentNode),t}get startNode(){return this._$AA}get endNode(){return this._$AB}_$AI(t,e=this){t=x(this,t,e),R(t)?t===c||t==null||t===""?(this._$AH!==c&&this._$AR(),this._$AH=c):t!==this._$AH&&t!==S&&this._(t):t._$litType$!==void 0?this.$(t):t.nodeType!==void 0?this.T(t):Pt(t)?this.k(t):this._(t)}S(t){return this._$AA.parentNode.insertBefore(t,this._$AB)}T(t){this._$AH!==t&&(this._$AR(),this._$AH=this.S(t))}_(t){this._$AH!==c&&R(this._$AH)?this._$AA.nextSibling.data=t:this.T(E.createTextNode(t)),this._$AH=t}$(t){let{values:e,_$litType$:s}=t,i=typeof s=="number"?this._$AC(t):(s.el===void 0&&(s.el=N.createElement(ft(s.h,s.h[0]),this.options)),s);if(this._$AH?._$AD===i)this._$AH.p(e);else{let n=new J(i,this),o=n.u(this.options);n.p(e),this.T(o),this._$AH=n}}_$AC(t){let e=dt.get(t.strings);return e===void 0&&dt.set(t.strings,e=new N(t)),e}k(t){pt(this._$AH)||(this._$AH=[],this._$AR());let e=this._$AH,s,i=0;for(let n of t)i===e.length?e.push(s=new r(this.S(T()),this.S(T()),this,this.options)):s=e[i],s._$AI(n),i++;i<e.length&&(this._$AR(s&&s._$AB.nextSibling,i),e.length=i)}_$AR(t=this._$AA.nextSibling,e){for(this._$AP?.(!1,!0,e);t&&t!==this._$AB;){let s=t.nextSibling;t.remove(),t=s}}setConnected(t){this._$AM===void 0&&(this._$Cv=t,this._$AP?.(t))}},C=class{get tagName(){return this.element.tagName}get _$AU(){return this._$AM._$AU}constructor(t,e,s,i,n){this.type=1,this._$AH=c,this._$AN=void 0,this.element=t,this.name=e,this._$AM=i,this.options=n,s.length>2||s[0]!==""||s[1]!==""?(this._$AH=Array(s.length-1).fill(new String),this.strings=s):this._$AH=c}_$AI(t,e=this,s,i){let n=this.strings,o=!1;if(n===void 0)t=x(this,t,e,0),o=!R(t)||t!==this._$AH&&t!==S,o&&(this._$AH=t);else{let d=t,a,h;for(t=n[0],a=0;a<n.length-1;a++)h=x(this,d[s+a],e,a),h===S&&(h=this._$AH[a]),o||=!R(h)||h!==this._$AH[a],h===c?t=c:t!==c&&(t+=(h??"")+n[a+1]),this._$AH[a]=h}o&&!i&&this.j(t)}j(t){t===c?this.element.removeAttribute(this.name):this.element.setAttribute(this.name,t??"")}},G=class extends C{constructor(){super(...arguments),this.type=3}j(t){this.element[this.name]=t===c?void 0:t}},Q=class extends C{constructor(){super(...arguments),this.type=4}j(t){this.element.toggleAttribute(this.name,!!t&&t!==c)}},W=class extends C{constructor(t,e,s,i,n){super(t,e,s,i,n),this.type=5}_$AI(t,e=this){if((t=x(this,t,e,0)??c)===S)return;let s=this._$AH,i=t===c&&s!==c||t.capture!==s.capture||t.once!==s.once||t.passive!==s.passive,n=t!==c&&(s===c||i);i&&this.element.removeEventListener(this.name,this,s),n&&this.element.addEventListener(this.name,this,t),this._$AH=t}handleEvent(t){typeof this._$AH=="function"?this._$AH.call(this.options?.host??this.element,t):this._$AH.handleEvent(t)}},X=class{constructor(t,e,s){this.element=t,this.type=6,this._$AN=void 0,this._$AM=e,this.options=s}get _$AU(){return this._$AM._$AU}_$AI(t){x(this,t)}};var Ut=Y.litHtmlPolyfillSupport;Ut?.(N,O),(Y.litHtmlVersions??=[]).push("3.1.2");var gt=(r,t,e)=>{let s=e?.renderBefore??t,i=s._$litPart$;if(i===void 0){let n=e?.renderBefore??null;s._$litPart$=i=new O(t.insertBefore(T(),n),n,void 0,e??{})}return i._$AI(r),i};var v=class extends g{constructor(){super(...arguments),this.renderOptions={host:this},this._$Do=void 0}createRenderRoot(){let t=super.createRenderRoot();return this.renderOptions.renderBefore??=t.firstChild,t}update(t){let e=this.render();this.hasUpdated||(this.renderOptions.isConnected=this.isConnected),super.update(t),this._$Do=gt(e,this.renderRoot,this.renderOptions)}connectedCallback(){super.connectedCallback(),this._$Do?.setConnected(!0)}disconnectedCallback(){super.disconnectedCallback(),this._$Do?.setConnected(!1)}render(){return S}};v._$litElement$=!0,v["finalized"]=!0,globalThis.litElementHydrateSupport?.({LitElement:v});var Tt=globalThis.litElementPolyfillSupport;Tt?.({LitElement:v});(globalThis.litElementVersions??=[]).push("4.0.4");var $t=r=>(t,e)=>{e!==void 0?e.addInitializer(()=>{customElements.define(r,t)}):customElements.define(r,t)};var Rt={attribute:!0,type:String,converter:k,reflect:!1,hasChanged:I},Nt=(r=Rt,t,e)=>{let{kind:s,metadata:i}=e,n=globalThis.litPropertyMetadata.get(i);if(n===void 0&&globalThis.litPropertyMetadata.set(i,n=new Map),n.set(e.name,r),s==="accessor"){let{name:o}=e;return{set(d){let a=t.get.call(this);t.set.call(this,d),this.requestUpdate(o,a,r)},init(d){return d!==void 0&&this.P(o,void 0,r),d}}}if(s==="setter"){let{name:o}=e;return function(d){let a=this[o];t.call(this,d),this.requestUpdate(o,a,r)}}throw Error("Unsupported decorator location: "+s)};function A(r){return(t,e)=>typeof e=="object"?Nt(r,t,e):((s,i,n)=>{let o=i.hasOwnProperty(n);return i.constructor.createProperty(n,o?{...s,wrapped:!0}:s),o?Object.getOwnPropertyDescriptor(i,n):void 0})(r,t,e)}var m=class extends v{constructor(){super(...arguments);this.loading=!0;this.error=!1;this.data=[];this.URL="https://data.sportlink.com/"}returnDutchDate(e){let s={year:"numeric",month:"long",day:"numeric"},i=new Date(e);return new Intl.DateTimeFormat("nl-NL",s).format(i)}getType(){return this.type!==void 0&&this.type==="uitslag"?"uitslagen":"programma"}async getData(){let e=new URL(`${this.URL}${this.getType()}`);return e.searchParams.append("client_id",this.clientId),e.searchParams.append("teamcode",this.teamCode),await fetch(e).then(s=>s.ok?s.json():new Error("error in call"))}async getMeta(){let e=document.getElementsByTagName("meta");this.clientId=this.clientId!==void 0?this.clientId:e.namedItem("clientId")?.content,this.teamCode=this.teamCode!==void 0?this.teamCode:e.namedItem("teamCode")?.content,!this.clientId||!this.teamCode?this.error=!0:(this.data=await this.getData(),this.data=this.single?this.data.slice(0,1):this.data.length>3?this.data.slice(0,3):this.data,this.loading=!1)}connectedCallback(){super.connectedCallback(),this.getMeta(),this.dispatchEvent(new CustomEvent("connected"))}renderTeamCard(e,s){return u`
      <div>
        ${s?u`<img src=https://logoapi.voetbal.nl/logo.php?clubcode=${s} alt="club logo ${e}" />`:null}
        <div>${e}</div>
      </div>
    `}renderMeta(e){return u`
      ${e.klassepoule?u`<span class="wedstrijd-klassepoule"
            >${e.klassepoule}</span
          >`:null}
      <time class="wedstrijd-datum" datetime="${e.wedstrijddatum}"
        >${this.returnDutchDate(e.wedstrijddatum)}</time
      >
      ${e.uitslag?u`<span class="wedstrijd-aanvrangstijd-or-uitslag"
            >${e.uitslag}</span
          >`:u`<time class"wedstrijd-aanvrangstijd-or-uitslag" datetime="${e.aanvangstijd}">${e.aanvangstijd}</time>`}
    `}wedstrijdTitel(){return this.type==="programma"||this.type===void 0?u`<slot name="next_game"></slot>`:u`<slot name="previous_game"></slot>`}renderWedstrijd(){return this.data?.length>0?this.data.map(e=>u` <div class="wedstrijd">
            <div class="wedstrijd-thuis">
              ${this.renderTeamCard(e.thuisteam,e.thuisteamclubrelatiecode)}
            </div>
            <div class="wedstrijd-meta">${this.renderMeta(e)}</div>
            <div class="wedstrijd-uit">
              ${this.renderTeamCard(e.uitteam,e.uitteamclubrelatiecode)}
            </div>
          </div>`):u`
          <p><slot name="nogames">Er zijn geen webstrijden bekend.</slot></p>
        `}render(){return this.error?u`<div><slot name="error">Helaas, er is iets misgegaan.<slot></div>`:this.loading?u` <div>loading</div>`:u` <div class="wedstrijd-main">
            <h2>${this.wedstrijdTitel()}</h2>
            ${this.renderWedstrijd()}
          </div>`}};m.styles=K`
    :host {
      text-align: var(--sportlink-wedstrijd-text-align, center);
      color: var(--sportlink-wedstrijd-color, inherit);
      font-family: var(--sportlink-wedstrijd-font-family, inherit);
    }

    .wedstrijd {
      display: flex;
      justify-content: space-between;
      gap: var(--sportlink-wedstrijd-gutter, 1rem);
    }

    .wedstrijd-main {
      background: var(--sportlink-wedstrijd-background, #fff);
      padding-inline: var(--sportlink-wedstrijd-padding-inline, 1rem);
      padding-block: var(--sportlink-wedstrijd-padding-block, 1rem);
    }

    .wedstrijd-main h2 {
      margin-top: 0;
      font-family: var(--sportlink-wedstrijd-font-family-header, inherit);
      font-size: var(--sportlink-wedstrijd-font-family-header-size, inherit);
      font-weight: var(--sportlink-wedstrijd-font-family-header-weight, 600);
    }

    .wedstrijd img {
      aspect-ratio: 1.5 / 2;
      max-width: 50px;
    }

    .wedstrijd {
      padding-inline-start: var(--sportlink-wedstrijd-padding-inline-start, 0);
      padding-inline-end: var(--sportlink-wedstrijd-inline-end, 0);
      padding-block-start: var(--sportlink-wedstrijd-block-start, 0);
      padding-block-end: var(--sportlink-wedstrijd-block-end, 0);
    }

    .wedstrijd:not(:last-of-type) {
      border-bottom: 1px solid
        var(--sportlink-wedstrijd-wedstrijd-border-bottom, lightgrey);
    }

    .wedstrijd-thuis,
    .wedstrijd-uit {
      display: flex;
      flex-direction: column;
      justify-content: center;
      color: var(--sportlink-wedstrijd-wedstrijd-team-color, inherit);
      font-size: var(--sportlink-wedstrijd-wedstrijd-team-font-size, inherit);
      width: var(--sportlink-wedstrijd-wedstrijd-team-logo-width, 6rem);
    }

    .wedstrijd-meta {
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      align-items: center;
    }

    .wedstrijd-datum {
      padding-inline: var(--sportlink-wedstrijd-datum-padding-inline, 0);
      padding-block: var(--sportlink-wedstrijd-datum-padding-block, 0);
      font-size: var(--sportlink-wedstrijd-datum-team-font-size, inherit);
      font-weight: var(--sportlink-wedstrijd-datum-font-family-weight, inherit);
    }

    .wedstrijd-aanvangstijd-or-uitslag {
      padding-inline: var(--sportlink-wedstrijd-aanvangstijd-padding-inline, 0);
      padding-block: var(--sportlink-wedstrijd-aanvangstijd-padding-block, 0);
      font-size: var(
        --sportlink-wedstrijd-aanvangstijd-team-font-size,
        inherit
      );
      font-weight: var(
        --sportlink-wedstrijd-aanvangstijd-font-family-weight,
        inherit
      );
    }

    .wedstrijd-klassepoule {
      color: var(--sportlink-wedstrijd-poule-color, inherit);
    }
  `,y([A()],m.prototype,"clientId",2),y([A()],m.prototype,"teamCode",2),y([A()],m.prototype,"type",2),y([A()],m.prototype,"single",2),y([A()],m.prototype,"loading",2),y([A()],m.prototype,"error",2),m=y([$t("sportlink-wedstrijd")],m);})();
/*! Bundled license information:

@lit/reactive-element/css-tag.js:
  (**
   * @license
   * Copyright 2019 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/reactive-element.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

lit-html/lit-html.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

lit-element/lit-element.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

lit-html/is-server.js:
  (**
   * @license
   * Copyright 2022 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/decorators/custom-element.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/decorators/property.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/decorators/state.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/decorators/event-options.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/decorators/base.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/decorators/query.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/decorators/query-all.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/decorators/query-async.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/decorators/query-assigned-elements.js:
  (**
   * @license
   * Copyright 2021 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)

@lit/reactive-element/decorators/query-assigned-nodes.js:
  (**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   *)
*/
