import{r as m,o as p,b as t,d as s,t as i,f,c as u,q as g,u as l,e as c,F as h,s as v,k}from"./app.bbfba000.js";const y=["value"],S={__name:"Input",props:["modelValue"],emits:["update:modelValue"],setup(o){const e=m(null);return p(()=>{e.value.hasAttribute("autofocus")&&e.value.focus()}),(a,r)=>(t(),s("input",{class:"border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",value:o.modelValue,onInput:r[0]||(r[0]=n=>a.$emit("update:modelValue",n.target.value)),ref_key:"input",ref:e},null,40,y))}},b={class:"block font-medium text-sm text-gray-700"},$={key:0},x={key:1},F={__name:"Label",props:["value"],setup(o){return(e,a)=>(t(),s("label",b,[o.value?(t(),s("span",$,i(o.value),1)):(t(),s("span",x,[f(e.$slots,"default")]))]))}},V={key:0},w=c("div",{class:"font-medium text-red-600"},"Whoops! Something went wrong.",-1),B={class:"mt-3 list-disc list-inside text-sm text-red-600"},I={__name:"ValidationErrors",setup(o){const e=u(()=>g().props.value.errors),a=u(()=>Object.keys(e.value).length>0);return(r,n)=>l(a)?(t(),s("div",V,[w,c("ul",B,[(t(!0),s(h,null,v(l(e),(d,_)=>(t(),s("li",{key:_},i(d),1))),128))])])):k("",!0)}};export{I as _,F as a,S as b};
