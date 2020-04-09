

const knex = require('../_helpers/knex/pg');

module.exports = {
        getAll:function(){
            return knex('products');
        },
        getOne:function(id){
            return knex('products').where('id',id);
        },
        create:function(data){
     
            var product = {
                name:data.name,
                price:data.price,
                product_group_id:data.product_group_id,
                description:data.description,
                sale:data.sale,
                codename:data.codename,
                json_data:JSON.stringify(data)

            }
            return knex('products').insert(product).returning('*');
        },
        update:function(id,data){
            return knex('products').where('id',id).update(data,'*');
        },
        del:function(id,data){
            return knex('products').where('id',id).del();
        }

    
}