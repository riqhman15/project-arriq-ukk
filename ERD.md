# Entity Relationship Diagram (ERD)

## Database Schema Overview

This document describes the Entity Relationship Diagram for the Dokumentasi Tempat application.

## Entities and Relationships

```
┌─────────────────┐
│     Users       │
├─────────────────┤
│ id (PK)         │
│ name            │
│ email (UNIQUE)  │
│ password        │
│ email_verified_at
│ remember_token  │
│ created_at      │
│ updated_at      │
└─────────────────┘

┌──────────────────────┐
│    Kategoris         │
├──────────────────────┤
│ id (PK)              │
│ nama                 │
│ created_at           │
│ updated_at           │
└──────────────────────┘
           △
           │ 1:N
           │ (hasMany)
           │
┌──────────────────────┐
│      Tempats         │
├──────────────────────┤
│ id (PK)              │
│ nama                 │
│ alamat               │
│ kategori_id (FK)     │
│ foto                 │
│ judul                │
│ keterangan           │
│ created_at           │
│ updated_at           │
└──────────────────────┘

┌──────────────────────┐
│      Fotos           │
├──────────────────────┤
│ id (PK)              │
│ created_at           │
│ updated_at           │
└──────────────────────┘

┌──────────────────────┐
│    Dashboards        │
├──────────────────────┤
│ id (PK)              │
│ total_tempat         │
│ total_kategori       │
│ total_user           │
│ created_at           │
│ updated_at           │
└──────────────────────┘
```

## Table Details

### Users Table
| Column | Type | Constraint | Description |
|--------|------|-----------|-------------|
| id | bigint | PRIMARY KEY | User identifier |
| name | varchar | NOT NULL | User name |
| email | varchar | UNIQUE, NOT NULL | User email |
| email_verified_at | timestamp | NULLABLE | Email verification timestamp |
| password | varchar | NOT NULL | Hashed password |
| remember_token | varchar | NULLABLE | Remember me token |
| created_at | timestamp | NOT NULL | Created timestamp |
| updated_at | timestamp | NOT NULL | Updated timestamp |

### Kategoris Table
| Column | Type | Constraint | Description |
|--------|------|-----------|-------------|
| id | bigint | PRIMARY KEY | Category identifier |
| nama | varchar | NOT NULL | Category name |
| created_at | timestamp | NOT NULL | Created timestamp |
| updated_at | timestamp | NOT NULL | Updated timestamp |

### Tempats Table
| Column | Type | Constraint | Description |
|--------|------|-----------|-------------|
| id | bigint | PRIMARY KEY | Place identifier |
| nama | varchar | NOT NULL | Place name |
| alamat | text | NOT NULL | Place address |
| kategori_id | bigint | FOREIGN KEY | Reference to kategoris table |
| foto | varchar | NULLABLE | Photo/image file |
| judul | varchar | NULLABLE | Title |
| keterangan | text | NULLABLE | Description |
| created_at | timestamp | NOT NULL | Created timestamp |
| updated_at | timestamp | NOT NULL | Updated timestamp |

### Fotos Table
| Column | Type | Constraint | Description |
|--------|------|-----------|-------------|
| id | bigint | PRIMARY KEY | Photo identifier |
| created_at | timestamp | NOT NULL | Created timestamp |
| updated_at | timestamp | NOT NULL | Updated timestamp |

### Dashboards Table
| Column | Type | Constraint | Description |
|--------|------|-----------|-------------|
| id | bigint | PRIMARY KEY | Dashboard identifier |
| total_tempat | integer | NOT NULL, DEFAULT 0 | Total places count |
| total_kategori | integer | NOT NULL, DEFAULT 0 | Total categories count |
| total_user | integer | NOT NULL, DEFAULT 0 | Total users count |
| created_at | timestamp | NOT NULL | Created timestamp |
| updated_at | timestamp | NOT NULL | Updated timestamp |

## Relationships

### One-to-Many (1:N)
- **Kategoris** → **Tempats**: One category can have many places
  - Foreign Key: `tempats.kategori_id` → `kategoris.id`
  - Relationship: `Kategori::hasMany(Tempat::class)`
  - Reverse: `Tempat::belongsTo(Kategori::class)`

