create table dbo.WorkOrders
(
    WorkOrderID int identity
        primary key,
    MachineID   int  not null
        references dbo.Machines,
    WODate      date not null,
    Description nvarchar(200) collate SQL_Latin1_General_CP1_CI_AS,
    Status      nvarchar(50) collate SQL_Latin1_General_CP1_CI_AS
)
go

