create table dbo.Productions
(
    ProductionID   int identity
        primary key,
    MachineID      int  not null
        references dbo.Machines,
    ProductionDate date not null,
    Shift          nvarchar(20) collate SQL_Latin1_General_CP1_CI_AS,
    OutputQty      int,
    DefectQty      int
)
go

INSERT INTO operational_management.dbo.Productions (ProductionID, MachineID, ProductionDate, Shift, OutputQty, DefectQty) VALUES (2, 1, N'2025-09-01', N'Shift 1', 1200, 5);
INSERT INTO operational_management.dbo.Productions (ProductionID, MachineID, ProductionDate, Shift, OutputQty, DefectQty) VALUES (3, 1, N'2025-09-01', N'Shift 1', 1500, 4);
INSERT INTO operational_management.dbo.Productions (ProductionID, MachineID, ProductionDate, Shift, OutputQty, DefectQty) VALUES (5, 1, N'2025-09-01', N'Shift 3', 1500, 7);
