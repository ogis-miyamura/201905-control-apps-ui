-- Project Name : アプリ管理UI ER図
-- Date/Time    : 2019/05/29 18:14:33
-- Author       : P1868264
-- RDBMS Type   : PostgreSQL
-- Application  : A5:SQL Mk-2

/*
  BackupToTempTable, RestoreFromTempTable疑似命令が付加されています。
  これにより、drop table, create table 後もデータが残ります。
  この機能は一時的に $$TableName のような一時テーブルを作成します。
*/

-- アプリケーション
--* BackupToTempTable
drop table if exists applications cascade;

--* RestoreFromTempTable
create table applications (
  id serial not null
  , title varchar
  , comment varchar
  , created date
  , updated date
  , constraint applications_PKC primary key (id)
) ;

-- 属性タイプ
--* BackupToTempTable
drop table if exists parameter_types cascade;

--* RestoreFromTempTable
create table parameter_types (
  id serial not null
  , title varchar
  , regex varchar
  , comment varchar
  , created date
  , updated date
  , constraint parameter_types_PKC primary key (id)
) ;

-- 対象サーバー属性値
--* BackupToTempTable
drop table if exists server_parameters cascade;

--* RestoreFromTempTable
create table server_parameters (
  id serial not null
  , server_id integer not null
  , application_id integer not null
  , parameter_type_id integer not null
  , value varchar
  , comment varchar
  , created date
  , updated date
  , constraint server_parameters_PKC primary key (id)
) ;

-- 対象サーバー
--* BackupToTempTable
drop table if exists servers cascade;

--* RestoreFromTempTable
create table servers (
  id serial not null
  , title varchar
  , comment varchar
  , created date
  , updated date
  , constraint servers_PKC primary key (id)
) ;

-- 設定テンプレート
--* BackupToTempTable
drop table if exists config_templates cascade;

--* RestoreFromTempTable
create table config_templates (
  id serial not null
  , title varchar
  , text varchar
  , comment varchar
  , created date
  , updated date
  , constraint config_templates_PKC primary key (id)
) ;

-- 属性ビュー
drop view if exists parameters_view;

create view parameters_view as 
select
  sv.title server_title
  , ap.title application_title
  , pt.title parameter_type_title
  , sp.value
  , sp.comment 
from
  servers sv 
  left join server_parameters sp 
    on (sp.server_id in (0, sv.id)) 
  left join applications ap 
    on ap.id = sp.application_id 
  left join parameter_types pt 
    on pt.id = sp.parameter_type_id 
order by
  sv.id
  , ap.id
  , pt.id

;

alter table server_parameters
  add constraint server_parameters_FK1 foreign key (application_id) references applications(id);

alter table server_parameters
  add constraint server_parameters_FK2 foreign key (parameter_type_id) references parameter_types(id);

alter table server_parameters
  add constraint server_parameters_FK3 foreign key (server_id) references servers(id);

comment on table applications is 'アプリケーション';
comment on column applications.id is 'id';
comment on column applications.title is 'タイトル';
comment on column applications.comment is 'コメント';
comment on column applications.created is '作成日時';
comment on column applications.updated is '更新日時';

comment on table parameter_types is '属性タイプ';
comment on column parameter_types.id is 'id';
comment on column parameter_types.title is 'タイトル';
comment on column parameter_types.regex is '正規表現';
comment on column parameter_types.comment is 'コメント';
comment on column parameter_types.created is '作成日時';
comment on column parameter_types.updated is '更新日時';

comment on table server_parameters is '対象サーバー属性値';
comment on column server_parameters.id is 'id';
comment on column server_parameters.server_id is '対象サーバーID';
comment on column server_parameters.application_id is 'アプリケーションID';
comment on column server_parameters.parameter_type_id is '属性タイプID';
comment on column server_parameters.value is '値';
comment on column server_parameters.comment is 'コメント';
comment on column server_parameters.created is '作成日時';
comment on column server_parameters.updated is '更新日時';

comment on table servers is '対象サーバー';
comment on column servers.id is 'id';
comment on column servers.title is 'タイトル';
comment on column servers.comment is 'コメント';
comment on column servers.created is '作成日時';
comment on column servers.updated is '更新日時';

comment on table config_templates is '設定テンプレート';
comment on column config_templates.id is 'id';
comment on column config_templates.title is 'タイトル';
comment on column config_templates.text is 'テキスト';
comment on column config_templates.comment is 'コメント';
comment on column config_templates.created is '作成日時';
comment on column config_templates.updated is '更新日時';

