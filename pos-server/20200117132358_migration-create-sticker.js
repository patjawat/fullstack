
exports.up = function(knex) {
  return knex.schema.createTable('sticker',(table) => {
    table.increments();
    label.text('title');
    label.text('description');
    label.float('rating');
    table.text('url');
  });
};

exports.down = function(knex) {
  return knex.schema.dropTable('sticker');
};
