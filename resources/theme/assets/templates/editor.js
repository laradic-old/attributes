define(['jade'], function(jade) { if(jade && jade['runtime'] !== undefined) { jade = jade.runtime; }

return function template(locals) {
var buf = [];
var jade_mixins = {};
var jade_interp;
;var locals_for_with = (locals || {});(function (bp1, bp2, breakpoint, values) {
jade_mixins["form"] = function(type, bordered, title){
var block = (this && this.block), attributes = (this && this.attributes) || {};
buf.push("<form" + (jade.attrs(jade.merge([{"role": "form","class": (jade_interp = [true], jade.joinClasses(["form-" + type + (bordered ? " form-bordered" : null)].map(jade.joinClasses).map(function (cls, i) {   return jade_interp[i] ? jade.escape(cls) : cls })))},attributes]), false)) + ">");
block && block();
buf.push("</form>");
};
jade_mixins["form-title"] = function(title, breakpoint, bp1, bp2){
var block = (this && this.block), attributes = (this && this.attributes) || {};
if ( breakpoint)
{
buf.push("<div" + (jade.cls(["col-" + breakpoint + "-offset-" + bp1 + " col-" + breakpoint + "-" + bp2], [true])) + "><h4>" + (jade.escape(null == (jade_interp = title) ? "" : jade_interp)) + "</h4></div>");
}
else
{
buf.push("<h4>" + (jade.escape(null == (jade_interp = title) ? "" : jade_interp)) + "</h4>");
}
};
jade_mixins["form-group"] = function(id, name, breakpoint, bp1, bp2){
var block = (this && this.block), attributes = (this && this.attributes) || {};
buf.push("<div class=\"form-group\"><label" + (jade.cls(['control-label',(breakpoint ? "col-" + breakpoint + "-" + bp1 : null)], [null,true])) + ">" + (jade.escape((jade_interp = name) == null ? '' : jade_interp)) + "</label>");
if ( breakpoint)
{
buf.push("<div" + (jade.cls(["col-" + breakpoint + "-" + bp2], [true])) + ">");
block && block();
buf.push("</div>");
}
else
{
block && block();
}
buf.push("</div>");
};
jade_mixins["form-input"] = function(id, type, placeholder){
var block = (this && this.block), attributes = (this && this.attributes) || {};
buf.push("<input" + (jade.attrs(jade.merge([{"name": jade.escape(id),"id": jade.escape(id),"type": jade.escape(type),"placeholder": jade.escape(placeholder ? placeholder + ".." : null),"class": "form-control"},attributes]), false)) + "/>");
};
jade_mixins["form-actions"] = function(breakpoint, bp1, bp2){
var block = (this && this.block), attributes = (this && this.attributes) || {};
buf.push("<div class=\"form-actions\">");
if ( breakpoint)
{
buf.push("<div" + (jade.cls(["col-" + breakpoint + "-offset-" + bp1 + " col-" + breakpoint + "-" + bp2], [true])) + ">");
block && block();
buf.push("</div>");
}
else
{
block && block();
}
buf.push("</div>");
};
breakpoint = "md"
bp1 = 3
bp2 = 9
values = values || {};
jade_mixins["input-group"] = function(id, name, type, maxLen){
var block = (this && this.block), attributes = (this && this.attributes) || {};
if(maxLen){
attributes["maxlength"] = maxLen;
attributes["class"] = "maxLength";
}
jade_mixins["form-group"].call({
block: function(){
jade_mixins["form-input"].call({
attributes: jade.merge([attributes])
}, id, type, name);
}
}, id, name, breakpoint, bp1, bp2);
};
jade_mixins["form"].call({
block: function(){
jade_mixins["form-title"]("General", breakpoint, bp1, bp2);
jade_mixins["input-group"].call({
attributes: {"value": jade.escape(values.label ? values.label:null)}
}, 'label', 'Label', 'text', 20);
jade_mixins["input-group"].call({
attributes: {"value": jade.escape(values.slug ? values.slug:null)}
}, 'slug', 'Slug', 'text', 20);
jade_mixins["input-group"].call({
attributes: {"value": jade.escape(values.description ? values.description:null)}
}, 'description', 'Description', 'text');
jade_mixins["input-group"].call({
attributes: {"value": "1","checked": jade.escape(values.enabled ? values.enabled:null),"class": "switch"}
}, 'enabled', 'Enabled', 'checkbox');
jade_mixins["form-title"]("Field type", breakpoint, bp1, bp2);
jade_mixins["input-group"].call({
attributes: {"value": jade.escape(values.field_type ? values.field_type:null)}
}, "field_type", "Field type", "text");
jade_mixins["form-actions"].call({
block: function(){
buf.push("<a role=\"button\" href=\"javascript:;\" data-action=\"save\" class=\"btn btn-success\">Save</a><a role=\"button\" href=\"javascript:;\" data-action=\"close\" class=\"btn btn-warning\">Close</a><a role=\"button\" href=\"javascript:;\" data-action=\"delete\" data-toggle=\"confirmation\" class=\"btn btn-danger\">Delete</a>");
}
}, breakpoint, bp1, bp2);
}
}, "horizontal", true);}.call(this,"bp1" in locals_for_with?locals_for_with.bp1:typeof bp1!=="undefined"?bp1:undefined,"bp2" in locals_for_with?locals_for_with.bp2:typeof bp2!=="undefined"?bp2:undefined,"breakpoint" in locals_for_with?locals_for_with.breakpoint:typeof breakpoint!=="undefined"?breakpoint:undefined,"values" in locals_for_with?locals_for_with.values:typeof values!=="undefined"?values:undefined));;return buf.join("");
}

});