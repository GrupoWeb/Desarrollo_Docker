if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('USUARIOS') and o.name = 'FK_USUARIOS_REFERENCE_TIPO_USU')
alter table USUARIOS
   drop constraint FK_USUARIOS_REFERENCE_TIPO_USU
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('USUARIOS') and o.name = 'FK_USUARIOS_REFERENCE_PERSONAL')
alter table USUARIOS
   drop constraint FK_USUARIOS_REFERENCE_PERSONAL
go

if exists (select 1
            from  sysobjects
           where  id = object_id('PERSONAL')
            and   type = 'U')
   drop table PERSONAL
go

if exists (select 1
            from  sysobjects
           where  id = object_id('TIPO_USUARIO')
            and   type = 'U')
   drop table TIPO_USUARIO
go

if exists (select 1
            from  sysobjects
           where  id = object_id('USUARIOS')
            and   type = 'U')
   drop table USUARIOS
go

/*==============================================================*/
/* Table: PERSONAL                                              */
/*==============================================================*/
create table PERSONAL (
   ID_PERSONAL          integer              not null identity(1,1),
   NOMBRE               varchar(100)         null,
   constraint PK_PERSONAL primary key (ID_PERSONAL)
)
go

/*==============================================================*/
/* Table: TIPO_USUARIO                                          */
/*==============================================================*/
create table TIPO_USUARIO (
   ID_TIPO_USUARIO      integer              not null identity(1,1),
   TIPO                 varchar(100)         null,
   constraint PK_TIPO_USUARIO primary key (ID_TIPO_USUARIO)
)
go

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS (
   ID_USUARIOS          integer              not null identity(1,1),
   ID_TIPO_USUARIO      integer              null,
   ID_PERSONAL          integer              null,
   USUARIO              varchar(100)         null,
   PASSWORD             varchar(100)         null,
   constraint PK_USUARIOS primary key (ID_USUARIOS)
)
go

if exists (select 1 from  sys.extended_properties
           where major_id = object_id('USUARIOS') and minor_id = 0)
begin 
   declare @CurrentUser sysname 
select @CurrentUser = user_name() 
execute sp_dropextendedproperty 'MS_Description',  
   'user', @CurrentUser, 'table', 'USUARIOS' 
 
end 


select @CurrentUser = user_name() 
execute sp_addextendedproperty 'MS_Description',  
   'usuarios', 
   'user', @CurrentUser, 'table', 'USUARIOS'
go

alter table USUARIOS
   add constraint FK_USUARIOS_REFERENCE_TIPO_USU foreign key (ID_TIPO_USUARIO)
      references TIPO_USUARIO (ID_TIPO_USUARIO)
go

alter table USUARIOS
   add constraint FK_USUARIOS_REFERENCE_PERSONAL foreign key (ID_PERSONAL)
      references PERSONAL (ID_PERSONAL)
go
