# UML Diagram (Unified Modeling Language)

## Class Diagram

### System Overview

```
┌────────────────────────────────────────────────┐
│           Application Architecture             │
└────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────┐
│                  User Model                         │
├─────────────────────────────────────────────────────┤
│ - id: BigInteger                                    │
│ - name: String                                      │
│ - email: String                                     │
│ - password: String                                  │
│ - email_verified_at: DateTime                       │
│ - remember_token: String                            │
│ - created_at: DateTime                              │
│ - updated_at: DateTime                              │
├─────────────────────────────────────────────────────┤
│ + casts(): array                                    │
│ + authenticate()                                    │
└─────────────────────────────────────────────────────┘

        △
        │ Authenticatable
        │
┌───────────────────────────────────────────────────────┐
│           Kategori Model                              │
├───────────────────────────────────────────────────────┤
│ - id: BigInteger                                      │
│ - nama: String                                        │
│ - created_at: DateTime                                │
│ - updated_at: DateTime                                │
├───────────────────────────────────────────────────────┤
│ + tempat(): HasMany                                   │
│ + getTempats(): Collection                            │
└───────────────────────────────────────────────────────┘
        △
        │ 1 ─────────────── N
        │                   │
        │            ┌──────┴──────────────┐
        │            │                     │
        └────────────┼─────────────────────┘
               hasMany│                     │belongsTo
                      │                     │
                      ▼                     ▼
        ┌─────────────────────────────────────────────────┐
        │         Tempat Model                            │
        ├─────────────────────────────────────────────────┤
        │ - id: BigInteger                                │
        │ - nama: String                                  │
        │ - alamat: String                                │
        │ - kategori_id: BigInteger (FK)                  │
        │ - foto: String                                  │
        │ - judul: String                                 │
        │ - keterangan: Text                              │
        │ - created_at: DateTime                          │
        │ - updated_at: DateTime                          │
        ├─────────────────────────────────────────────────┤
        │ + kategori(): BelongsTo                          │
        │ + getKategori(): Kategori                        │
        │ + getFoto(): String                             │
        │ + getDescription(): String                      │
        └─────────────────────────────────────────────────┘

┌──────────────────────────────────────────────┐
│        Foto Model                            │
├──────────────────────────────────────────────┤
│ - id: BigInteger                             │
│ - created_at: DateTime                       │
│ - updated_at: DateTime                       │
├──────────────────────────────────────────────┤
│ + uploadFoto(): Boolean                      │
│ + getFotoPath(): String                      │
└──────────────────────────────────────────────┘

┌──────────────────────────────────────────────┐
│      Dashboard Model                         │
├──────────────────────────────────────────────┤
│ - id: BigInteger                             │
│ - total_tempat: Integer                      │
│ - total_kategori: Integer                    │
│ - total_user: Integer                        │
│ - created_at: DateTime                       │
│ - updated_at: DateTime                       │
├──────────────────────────────────────────────┤
│ + getTotalTempat(): Integer                  │
│ + getTotalKategori(): Integer                │
│ + getTotalUser(): Integer                    │
│ + updateStats(): Void                        │
└──────────────────────────────────────────────┘
```

## Relationships Diagram

```
┌─────────────────┐
│   User          │
│  (Authenticates)│
└────────┬────────┘
         │
         │ Can manage
         │
    ┌────┴─────────────────────────────┐
    │                                   │
    ▼                                   ▼
┌────────────┐                  ┌──────────────┐
│ Kategori   │◄─────────────────│   Tempat     │
│            │   belongsTo      │              │
│ - id       │                  │ - id         │
│ - nama     │ 1            N   │ - nama       │
│ - created  │                  │ - alamat     │
│ - updated  │                  │ - kategori_id
│            │ hasMany          │ - foto       │
└────────────┘ ────────────────►│ - judul      │
                                │ - keterangan │
                                │ - created    │
                                │ - updated    │
                                └──────────────┘

┌──────────────┐
│  Dashboard   │
│  (Reports)   │
├──────────────┤
│ - total_     │
│   tempat     │◄─── Aggregates data from
│ - total_     │
│   kategori   │ ─── Kategori & Tempat
│ - total_     │
│   user       │◄─── Models
└──────────────┘
```

## Sequence Diagram

### Create New Place (Tempat)

```
User          Controller        Model          Database
 │               │               │                │
 ├─ Create Form ─►│               │                │
 │               │               │                │
 ├─ Submit ──────►│               │                │
 │               ├─ Validate ────►│                │
 │               │               ├─ Check FK ────►│
 │               │               │◄─ Result ──────┤
 │               │◄─ Valid ───────┤                │
 │               ├─ Create ──────►│                │
 │               │               ├─ Insert ──────►│
 │               │               │◄─ Success ─────┤
 │               │◄─ Instance ────┤                │
 │◄─ Redirect ───┤               │                │
 │               │               │                │
```

### View Dashboard

```
User          Controller        Model          Database
 │               │               │                │
 ├─ Dashboard ──►│               │                │
 │               ├─ Get Stats ───►│                │
 │               │               ├─ Count ──────►│
 │               │               │◄─ total ──────┤
 │               │               ├─ Get all ────►│
 │               │               │◄─ Records ────┤
 │               │◄─ Array ───────┤                │
 │               ├─ Render View ─►│                │
 │◄─ Display ────┤               │                │
 │               │               │                │
```

## Data Flow Diagram

```
           ┌────────────────────────┐
           │   User Interface       │
           │   (Blade Templates)    │
           └───────────┬────────────┘
                       │
                       ▼
           ┌────────────────────────┐
           │   Routes               │
           │   (web.php)            │
           └───────────┬────────────┘
                       │
                       ▼
           ┌────────────────────────┐
           │   Controllers          │
           │   (HTTP Layer)         │
           └───────────┬────────────┘
                       │
                       ▼
           ┌────────────────────────┐
           │   Models (Eloquent)    │
           │   - User               │
           │   - Kategori           │
           │   - Tempat             │
           │   - Foto               │
           │   - Dashboard          │
           └───────────┬────────────┘
                       │
                       ▼
           ┌────────────────────────┐
           │   Database Layer       │
           │   (Migrations)         │
           └───────────┬────────────┘
                       │
                       ▼
           ┌────────────────────────┐
           │   Storage              │
           │   (Fotos/Files)        │
           └────────────────────────┘
```

