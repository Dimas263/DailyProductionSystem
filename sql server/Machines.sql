create table dbo.Machines
(
    MachineID   int identity
        primary key,
    MachineName nvarchar(100) collate SQL_Latin1_General_CP1_CI_AS not null,
    Location    nvarchar(100) collate SQL_Latin1_General_CP1_CI_AS
)
go

INSERT INTO operational_management.dbo.Machines (MachineID, MachineName, Location) VALUES (1, N'Machine A', N'Line 1');
INSERT INTO operational_management.dbo.Machines (MachineID, MachineName, Location) VALUES (2, N'Machine B', N'Line 2');
INSERT INTO operational_management.dbo.Machines (MachineID, MachineName, Location) VALUES (3, N'Machine C', N'Line 3');
INSERT INTO operational_management.dbo.Machines (MachineID, MachineName, Location) VALUES (4, N'Machine D', N'Line 4');
