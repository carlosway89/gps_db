select
    table_schema "gps_savt",
    convert(sum(data_length+index_length)/1048576,decimal(6,2)) "SIZE (MB)"
from
    information_schema.tables
where
    table_schema!="information_schema"
group by
    table_schema;