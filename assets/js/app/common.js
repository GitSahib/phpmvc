function getTemplate(args) {
    if (!args.templateFile) {
        console.warn("getTemplate missing templateFile",args);
        return {};
    }
    return $.ajax({
        url: '../../home/handlebarTemplates/'+args.templateFile,
        dataType: 'text',
        dataFilter: function(source,type){
            var template = Handlebars.compile(source);
            var context = args.context ? args.context : {};
            console.log(context);
            return template(context);
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(args.templateFile+' HandlebarsTemplate error occurred: '+errorThrown);
        }
    });
}